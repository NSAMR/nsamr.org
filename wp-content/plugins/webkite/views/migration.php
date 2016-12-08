<?php
  wp_enqueue_script('webkite_migration_view_js');
  
  $webkite_authorized = true;
  if ( ! get_option( 'webkite_client_id' ) || ! get_option( 'webkite_client_secret' ) )
    $webkite_authorized = false;
  $webkite_account_page = "admin.php?page=webkite_account";
  $post_type = WEBKITE_POST_TYPE;

  wp_reset_vars(array('action'));
  global $action;
  
  $sendback = admin_url( 'admin.php?page=webkite_migration' );

  switch( $action ){
    case 'delete':
      $deleted = 0;
      $list_ids = array_map('intval', $_REQUEST['lists']);
      
      foreach( (array) $list_ids as $list_id ) {
        $list_del = get_post($list_id);
        if ( !current_user_can( 'delete_post', $list_id ) )
          wp_die( __('You are not allowed to delete this List.') );
        if ( !wp_delete_post($list_id) )
          wp_die( __('Error deleting this List.') );
        $deleted++;
      }
      $sendback = remove_query_arg( array('action','lists'), $sendback );
      wp_redirect( add_query_arg('deleted', $deleted, $sendback) );
      exit();
      break;
      
    case 'migrate':
      $list_ids = array_map('intval', $_REQUEST['lists']);
      webkite_p2_migrate($list_ids);
      $migrated = count($list_ids);
      
      $sendback = remove_query_arg( array('action','lists'), $sendback );
      wp_redirect( add_query_arg('migrated', $migrated, $sendback) );
      exit();
      break;
    
    default:
      break;
  }

  $to_migrate = webkite_check_migration();

  $bulk_counts = array(
  	'deleted'  => isset( $_REQUEST['deleted'] ) ? absint( $_REQUEST['deleted'] ) : 0,
  	'migrated' => isset( $_REQUEST['migrated'] ) ? absint( $_REQUEST['migrated'] ) : 0,
  );
  $bulk_messages = array();
  $bulk_messages['list'] = array(
  	'deleted'  => _n( '%s List deleted.', '%s Lists deleted.', $bulk_counts['deleted'] ),
  	'migrated' => _n( '%s List migrated.', '%s Lists migrated.', $bulk_counts['migrated'] ),
  );
  
  $bulk_counts = array_filter( $bulk_counts );
  
  // If we have a bulk message to issue:
  $messages = array();
  foreach ( $bulk_counts as $message => $count ) {
  	if ( isset( $bulk_messages[ $post_type ][ $message ] ) )
  		$messages[] = sprintf( $bulk_messages[ $post_type ][ $message ], number_format_i18n( $count ) );
  	elseif ( isset( $bulk_messages['list'][ $message ] ) )
  		$messages[] = sprintf( $bulk_messages['list'][ $message ], number_format_i18n( $count ) );
  }
  
  $_SERVER['REQUEST_URI'] = remove_query_arg( array( 'locked', 'skipped', 'updated', 'deleted', 'trashed', 'untrashed' ), $_SERVER['REQUEST_URI'] );

  if (isset($_GET['noheader'])) {
    require_once(ABSPATH . 'wp-admin/admin-header.php');
  }
  
  /* helper function for post_date display */
  function webkite_migrate_post_date($list){
    if ( '0000-00-00 00:00:00' == $list->post_date ) {
      $t_time = $h_time = __( 'Unpublished' );
    } else {
      $t_time = get_the_time( __( 'm/d/Y g:i:s A' ), $list );
      $m_time = $list->post_date;
      $time = get_post_time( 'G', true, $list );

      $h_time = webkite_timestamp( $m_time );
    }
    return '<abbr title="' . $t_time . '">' . $h_time . '</abbr>';
  }
  /* helper function for sync status/date */
  function webkite_migrate_sync_date($list){
    $sync_status = get_post_meta($list->ID, '_webkite_spreadsheet_sync_status', true );
    
    if ( $sync_status && $sync_status == 'pending' ){
      $status_cell = 'syncing...';
    } elseif ( $sync_status && ( $sync_status == 'synced' || $sync_status == 'failed' ) ) {
      $last_sync = get_post_meta( $list->ID, '_webkite_last_sync_date', true );
      if ( $last_sync ) {
        $status_date = webkite_timestamp( $last_sync );
        $status_title = mysql2date( __( 'm/d/Y g:i:s A' ), $last_sync );
        $status_cell = '<abbr title="Successfully synced: ' . $status_title . '">' . $status_date . '</abbr>';
      } else {
        $status_cell = 'no';
      }
    } else {
      $status_cell = $sync_status;
    }
    return $status_cell;
  }
?>

<div class="wrap">
<?php if ( "yes" == get_option('webkite_upgrade_required') ) {
      include( WEBKITE_RESULTS_DIR . 'views/upgrade-needed.php' );
} else { ?>
  
  <div id="webkite_help">
    <div class="postbox">  
      <h3>Help With Lists</h3>
      <div class="inside">
        <ul>
          <li><a href="http://support.webkite.com/knowledgebase/articles/423847" target="_blank">How do I copy data from an existing spreadsheet to a new List?</a></li>
        </ul>
      </div>
    </div>
  </div>
  
  <div id="webkite_content"><div class="webkite-content-wrap">    
    <?php 
    if ( $messages )
      echo '<div id="message" class="updated below-h2"><p>' . join( ' ', $messages ) . '</p></div>';
    unset( $messages );
    ?>

    <?php if ( $webkite_authorized ){?>
      <?php if ( !$to_migrate ) {?>
        <h3>All lists migrated!</h3>
        <div>
          <a id="webkite-get-started" href="<?php echo admin_url('admin.php?page=webkite_list'); ?>"
              class="button button-large button-primary webkite-button"
              style="<?php echo $webkite_authorized_display; ?>">
            View Lists
          </a>
          <a href='<?php echo WEBKITE_ADMIN_URL; ?>'
              class='button button-large button-primary webkite-button'
              target='_blank'>
            Go to WebKite Admin
          </a>
        </div>
      <?php } else { ?>
        <h3 class="title">Lists With Errors Moving</h3>
        <p class="lead">We had to move your Lists so they could be used in the new system. We worked to move as many of your Lists as we could, but there were some problems moving some of them. If the List is not able to be moved with our system, you can manually copy the data into a new List using the instructions found <a href="http://support.webkite.com/knowledgebase/articles/423847" target="_blank">here</a>.</p>

        <form id="webkite_migrations" class="webkite_migration_list" action="">
          <input type="hidden" name="page" value="webkite_migration" />
          <input type="hidden" name="noheader" value="true" />
          
          <table class="webkite-migration-list widefat fixed" cellspacing="0">
            <thead>
              <tr>
                <th class="check-column webkite-check-column" scol="col"><input type="checkbox" class="webkite-select-all" autocomplete="off" /></th>
                <th class="column-title webkite-title-column" scol="col">WebKite Lists</th>
                <th class="column-post_date webkite-post_date-column" scol="col">Created</th>
                <th class="column-sync webkite-sync-column" scol="col">Synced</th>
              </tr>
            </thead>
            <tfoot>
              <tr>
                <th class="check-column webkite-check-column" scol="col"><input type="checkbox" class="webkite-select-all" autocomplete="off" /></th>
                <th class="column-title webkite-title-column" scol="col">WebKite Lists</th>
                <th class="column-post_date webkite-post_date-column" scol="col">Created</th>
                <th class="column-sync webkite-sync-column" scol="col">Synced</th>
              </tr>
            </tfoot>
            <tbody>
              <?php foreach ( $to_migrate as $list ){               
                $list_meta = get_post_meta( $list->ID ); 
                $migrate_link = sprintf('admin.php?page=%s&action=%s&lists[]=%s&noheader=true','webkite_migration','migrate',$list->ID);
                $delete_link = sprintf('admin.php?page=%s&action=%s&lists[]=%s&noheader=true','webkite_migration','delete',$list->ID);
                $list_post_date = webkite_migrate_post_date( $list );
                $sync_info = webkite_migrate_sync_date( $list );
                
                $list_output = '<tr class="webkite-migration-' . $list->ID . '">';
                
                if (!isset($list_meta[WEBKITE_MIGRATION_ERROR_METAKEY][0])){
                  $list_output .= '<th class="check-column webkite-check-column" scope="row">';
                  $list_output .= '<input type="checkbox" id="webkite-migrate-' . $list->ID . '" class="webkite-migrate-checkbox" name="lists[]" value="' . $list->ID . '" autocomplete="off" />';
                  $list_output .= '</th>';
                } else {
                  $list_output .= '<th class="check-column webkite-check-column"></th>';
                }
                
                $list_output .= '<td class="title column-title webkite-title-column">';
                $list_output .= '<strong class="row-title">' . $list->post_title;
                if ($list->post_status != 'publish'){
                  $list_output .= ' <span class="webkite-list-status">('. $list->post_status . ')</span>';
                }
                $list_output .= '</strong>';
                if (isset($list_meta[WEBKITE_MIGRATION_ERROR_METAKEY][0])){
                  $list_output .= '<div class="webkite-migration-errored">The List cannot be moved.</div>';
                }
                $list_output .= '<ul class="webkite-migration-actions">';
                if (!isset($list_meta[WEBKITE_MIGRATION_ERROR_METAKEY][0])){
                  $list_output .= '<li><a href="'. $migrate_link .'">Try to Move Again</a></li>';
                } else {
                  $list_output .= '<li><a href="http://support.webkite.com/knowledgebase/articles/429463" target="_blank">Support Document</a></li>';
                }
                if ( current_user_can( 'delete_post', $list->ID ) ){
                  $list_output .= '<li><a class="webkite-delete-list" href="'. $delete_link .'" 
                      onclick="return confirm(\'Are you sure you want to delete this list?\')">Delete</a></li>';
                }
                if (isset($list_meta['_webkite_spreadsheet_url'][0])){
                  $list_output .= '<li><a class="webkite-external-link" href="' . $list_meta['_webkite_spreadsheet_url'][0] . '" target="_blank">View Spreadsheet</a></li>';
                } else {
                  $list_output .= '<li><a class="webkite-external-link" href="https://docs.google.com/spreadsheet/ccc?key=' . $list_meta['_webkite_spreadsheet_key'][0] . '" target="_blank">View Spreadsheet</a></li>';
                }
                $list_output .= '</ul>';
                $list_output .= '</td>';
                
                $list_output .= '<td class="column-post_date webkite-post_date-column">' . $list_post_date . '</td>';
                $list_output .= '<td class="column-sync webkite-sync-column">' . $sync_info . '</td>';
                $list_output .= '</tr>';
                
                echo $list_output;
              } ?>
            </tbody>
          </table>
          
          <button type="button" id="webkite-bulk-migration" class="button button-primary button-large webkite-migration-button" disabled>Try Again for Selected</button>
          <button type="button" id="webkite-bulk-delete" class="button button-large webkite-migration-button" disabled>Delete Selected</button>
        </form>

      <?php } ?>
    <?php } else { ?>
      <p class="lead">
        Please visit the <a href="<?php echo admin_url($webkite_account_page); ?>">account page</a> and register in order to migrate Lists.
      </p>
    
    <?php } ?>
  </div></div>
  
<?php } ?>
</div>
