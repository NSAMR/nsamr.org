<?php if ( ! defined( 'ABSPATH' ) ) exit;

class NF_AJAX_Controllers_Submission extends NF_Abstracts_Controller
{
    protected $_form_data = array();

    protected $_preview_data = array();

    protected $_form_id = '';

    public function __construct()
    {
        if( isset( $_POST[ 'nf_resume' ] ) && isset( $_COOKIE[ 'nf_wp_session' ] ) ){
            add_action( 'ninja_forms_loaded', array( $this, 'resume' ) );
            return;
        }

        if( isset( $_POST['formData'] ) ) {
            $this->_form_data = json_decode( $_POST['formData'], TRUE  );

            // php5.2 fallback
            if( ! $this->_form_data ) $this->_form_data = json_decode( stripslashes( $_POST['formData'] ), TRUE  );
        }


        add_action( 'wp_ajax_nf_ajax_submit',   array( $this, 'submit' )  );
        add_action( 'wp_ajax_nopriv_nf_ajax_submit',   array( $this, 'submit' )  );

        add_action( 'wp_ajax_nf_ajax_resume',   array( $this, 'resume' )  );
        add_action( 'wp_ajax_nopriv_nf_ajax_resume',   array( $this, 'resume' )  );
    }

    public function submit()
    {
        check_ajax_referer( 'ninja_forms_display_nonce', 'security' );

        register_shutdown_function( array( $this, 'shutdown' ) );

        if( ! $this->_form_data ) {

            if( function_exists( 'json_last_error' ) // Function not supported in php5.2
                && function_exists( 'json_last_error_msg' )// Function not supported in php5.2
                && json_last_error() ){
                $this->_errors[] = json_last_error_msg();
            } else {
                $this->_errors[] = __( 'An unexpected error occurred.', 'ninja-forms' );
            }

            $this->_respond();
        }

        $this->_form_id = $this->_data[ 'form_id' ] = $this->_form_data['id'];

        if( isset( $this->_form_data[ 'settings' ][ 'is_preview' ] ) && $this->_form_data[ 'settings' ][ 'is_preview' ] ){
            $this->_preview_data = get_user_option( 'nf_form_preview_' . $this->_form_id );

            // Add preview field keys to form data.
            foreach( $this->_form_data[ 'fields' ] as $key => $field ){
                $field_id = $field[ 'id' ];
                $this->_form_data[ 'fields' ][ $key ][ 'key' ] = $this->_preview_data[ 'fields' ][ $field_id ][ 'settings' ][ 'key' ];
            }

            if( ! $this->_preview_data ){
                $this->_errors[ 'preview' ] = __( 'Preview does not exist.', 'ninja-forms' );
                $this->_respond();
            }
        }

        $this->_data['settings'] = $this->_form_data['settings'];

        $this->_data['extra'] = $this->_form_data['extra'];

        $this->_data['fields'] = $this->_form_data['fields'];

        $this->_data = apply_filters( 'ninja_forms_submit_data', $this->_data );

        $this->validate_fields();

        $this->process_fields();

        $this->process();
    }

    public function resume()
    {
        $this->_data = Ninja_Forms()->session()->get( 'nf_processing_data' );
        $this->_data[ 'resume' ] = $_POST[ 'nf_resume' ];

        $this->_form_id = $this->_data[ 'form_id' ];

        unset( $this->_data[ 'halt' ] );
        unset( $this->_data[ 'actions' ][ 'redirect' ] );

        $this->process();
    }

    protected function process()
    {
        foreach( $this->_data[ 'fields' ] as $field_id => $field ){
            if( $this->_preview_data ) {
                if( ! isset( $this->_preview_data[ 'fields' ][ $field[ 'id' ] ][ 'settings' ] ) ) return;
                $settings = $this->_preview_data[ 'fields' ][ $field[ 'id' ] ][ 'settings' ];
            } else {
                $field_model = Ninja_Forms()->form( $this->_form_id )->field($field['id'])->get();
                $settings = $field_model->get_settings();
            }
            $this->_data[ 'fields' ][ $field_id ] = array_merge( $this->_data[ 'fields' ][ $field_id ], $settings );
        }
        $field_merge_tags = Ninja_Forms()->merge_tags[ 'fields' ];
        $this->populate_field_merge_tags( $this->_data['fields'], $field_merge_tags );

        if( isset( $this->_data[ 'settings' ][ 'calculations' ] ) ) {
            $calcs_merge_tags = Ninja_Forms()->merge_tags[ 'calcs' ];
            $this->populate_calcs_merge_tags( $this->_data[ 'settings' ][ 'calculations' ], $calcs_merge_tags );
        }

        if( isset( $this->_data[ 'settings' ][ 'is_preview' ] ) && $this->_data[ 'settings' ][ 'is_preview' ] ) {
            $this->run_actions_preview();
        } else {
            $this->run_actions();
        }

        do_action( 'ninja_forms_after_submission', $this->_data );

        $this->_respond();
    }

    protected function populate_field_merge_tags( $fields, $field_merge_tags )
    {
        foreach( $fields as $field ){

            $field_merge_tags->add_field( $field );
        }
    }

    protected function populate_calcs_merge_tags( $calcs, $calcs_merge_tags )
    {
        foreach( $calcs as $calc ){

            $calcs_merge_tags->set_merge_tags( $calc[ 'name' ], apply_filters( 'ninja_forms_calc_setting', $calc[ 'eq' ] ) );
        }
    }

    protected function validate_fields()
    {
        foreach( $this->_data['fields'] as $field ){

            $errors = $this->validate_field( $field, $this->_data );

            if( ! empty( $errors ) ){
                $this->_errors[ 'fields' ][ $field['id'] ] = $errors;
            }
        }

        if( $this->_errors ) $this->_respond();
    }

    protected function validate_field( $field, $data )
    {
        if( $this->_preview_data ) {
            if( ! isset( $this->_preview_data[ 'fields' ][ $field[ 'id' ] ][ 'settings' ] ) ) return;
            $settings = $this->_preview_data[ 'fields' ][ $field[ 'id' ] ][ 'settings' ];
        } else {
            $field_model = Ninja_Forms()->form( $this->_form_id )->field($field['id'])->get();
            $settings = $field_model->get_settings();
        }

        $field = apply_filters( 'ninja_forms_pre_validate_field_settings', array_merge($field, $settings ) );

        $field_class = Ninja_Forms()->fields[ $field['type'] ];

        if( method_exists( $field_class, 'validate' ) ) {
            return $errors = $field_class->validate($field, $data);
        } else {
            return array();
        }
    }

    protected function process_fields()
    {
        foreach( $this->_data['fields'] as $field ){

            $data = $this->process_field( $field, $this->_data );

            if( ! empty( $data ) ){
                $this->_data = $data;
            }
        }
    }

    protected function process_field( $field, $data )
    {
        if( $this->_preview_data ) {
            if( ! isset( $this->_preview_data[ 'fields' ][ $field[ 'id' ] ][ 'settings' ] ) ) return;
            $settings = $this->_preview_data[ 'fields' ][ $field[ 'id' ] ][ 'settings' ];
        } else {
            $field_model = Ninja_Forms()->form( $this->_form_id )->field($field['id'])->get();
            $settings = $field_model->get_settings();
        }

        $field = array_merge($field, $settings );

        $field_class = Ninja_Forms()->fields[ $field['type'] ];


        return $field_class->process( $field, $data );
    }

    protected function run_actions()
    {
        $actions = Ninja_Forms()->form( $this->_form_id )->get_actions();

        $actions = apply_filters( 'ninja_forms_submission_actions', $actions, $this->_form_data );

        usort($actions, array($this, 'sort_form_actions'));

        if( ! isset( $this->_data[ 'processed_actions' ] ) ) $this->_data[ 'processed_actions' ] = array();
        foreach( $actions as $action ){

            if( in_array( $action->get_id(), $this->_data[ 'processed_actions' ] ) ) continue;

            $action_settings = apply_filters( 'ninja_forms_run_action_settings', $action->get_settings(), $this->_form_id, $action->get_id(), $this->_data['settings'] );

            if( ! $action_settings['active'] ) continue;

            $type = $action_settings['type'];

            if( ! apply_filters( 'ninja_forms_run_action_type_' . $type, TRUE ) ) continue;

            $action_settings[ 'id' ] = $action->get_id();

            if( ! isset( Ninja_Forms()->actions[ $type ] ) ) continue;

            $data = Ninja_Forms()->actions[$type]->process($action_settings, $this->_form_id, $this->_data);

            $this->_data = ( $data ) ? $data : $this->_data;

            $this->maybe_halt( $action->get_id() );
        }
    }

    protected function run_actions_preview()
    {
        $form = get_user_option( 'nf_form_preview_' . $this->_form_id );

        if( ! isset( $form[ 'actions' ] ) || empty( $form[ 'actions' ] ) ) return;

        foreach( $this->_form_data[ 'fields' ] as $key => $field ){
            if( ! isset( $form[ 'fields' ] ) ) continue;
            $field_tmp_id = $field[ 'id' ];
            $field_key = $form[ 'fields' ][ $field_tmp_id ][ 'settings' ][ 'key' ];
            $this->_form_data[ 'fields' ][ $key ][ 'key' ] = $field_key;
        }

        $form[ 'actions' ] = apply_filters( 'ninja_forms_submission_actions_preview', $form[ 'actions' ], array_merge( $form, $this->_form_data ) );

        usort( $form[ 'actions' ], array( $this, 'sort_form_actions' ) );

        if( ! isset( $this->_data[ 'processed_actions' ] ) ) $this->_data[ 'processed_actions' ] = array();
        foreach( $form[ 'actions' ] as $action_id => $action ){

            if( in_array( $action_id, $this->_data[ 'processed_actions' ] ) ) continue;

            $action_settings = apply_filters( 'ninja_forms_run_action_settings_preview', $action[ 'settings' ], $this->_form_id, '', $this->_data['settings'] );

            if( ! $action_settings['active'] ) continue;

            $type = $action_settings['type'];

	        if ( ! isset( Ninja_Forms()->actions[ $type ] ) ) {
		        continue;
	        }

            $data = Ninja_Forms()->actions[ $type ]->process( $action_settings, $this->_form_id, $this->_data );

            $this->_data = ( $data ) ? $data : $this->_data;

            $this->maybe_halt( $action_id );
        }
    }

    protected function maybe_halt( $action_id )
    {
        if( isset( $this->_data[ 'errors' ] ) && $this->_data[ 'errors' ] ){
            $this->_respond();
        }

        if( isset( $this->_data[ 'halt' ] ) && $this->_data[ 'halt' ] ){

            Ninja_Forms()->session()->set( 'nf_processing_data', $this->_data );

            $this->_respond();
        }

        array_push( $this->_data[ 'processed_actions' ], $action_id );
    }

    protected function sort_form_actions( $a, $b )
    {
        if( is_object( $a ) ) {
            if( ! isset( Ninja_Forms()->actions[ $a->get_setting( 'type' ) ] ) ) return -1;
            $a = Ninja_Forms()->actions[ $a->get_setting( 'type' ) ];
        } else {
            if( ! isset( Ninja_Forms()->actions[ $a[ 'settings' ][ 'type' ] ] ) ) return -1;
            $a = Ninja_Forms()->actions[ $a[ 'settings' ][ 'type' ] ];
        }

        if( is_object( $b ) ) {
            if( ! isset( Ninja_Forms()->actions[ $b->get_setting( 'type' ) ] ) ) return 1;
            $b = Ninja_Forms()->actions[ $b->get_setting( 'type' ) ];
        } else {
            if( ! isset( Ninja_Forms()->actions[ $b[ 'settings' ][ 'type' ] ] ) ) return 1;
            $b = Ninja_Forms()->actions[ $b[ 'settings' ][ 'type' ] ];
        }

        if ( $a->get_timing() == $b->get_timing() ) {
            if ( $a->get_priority() == $b->get_priority() ) {
                return 0;
            }
            return ( $a->get_priority() < $b->get_priority() ) ? -1 : 1;
        }

        return ( $a->get_timing() < $b->get_timing() ) ? -1 : 1;
    }

    public function shutdown()
    {
        $error = error_get_last();
        if( $error !== NULL && in_array( $error[ 'type' ], array( E_ERROR, E_CORE_ERROR, E_COMPILE_ERROR, E_USER_ERROR ) ) ) {
            $this->_errors[ 'form' ][ 'last' ] = __( 'The server encountered an error during processing.', 'ninja-forms' );
            $this->_errors[ 'last' ] = $error;
            $this->_respond();
        }
    }
}