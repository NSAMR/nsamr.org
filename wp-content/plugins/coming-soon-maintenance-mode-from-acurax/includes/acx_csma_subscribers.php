<?php
$acx_csma_message = "";
$acx_csma_subscribe_details=get_option('acx_csma_subscribe_user_details');
if($acx_csma_subscribe_details == "")
{
	$acx_csma_subscribe_details = array();
}
else
{	 
	if(is_serialized($acx_csma_subscribe_details))
	{
		$acx_csma_subscribe_details = unserialize($acx_csma_subscribe_details); 
	}	 
	if(!is_array($acx_csma_subscribe_details))
	{
		$acx_csma_subscribe_details = array();
	}
}
if(is_serialized($acx_csma_subscribe_details ))
{
	$acx_csma_subscribe_details = unserialize($acx_csma_subscribe_details); 
}
if(ISSET($_GET['action']))
{
	$del=$_GET['action'];
}
else
{
   $del='';
}
if(ISSET($_GET['ID']))
{
	$id=$_GET['ID'];
}
else
{
	$id='';
}
if($del == "delete" && $id !="")
{	
	foreach($acx_csma_subscribe_details as $key=>$value)
	{
		if($id-1 == $key)
		{
			unset($acx_csma_subscribe_details[$id-1]);
			$acx_csma_subscribe_details = array_values($acx_csma_subscribe_details);
			if(!is_serialized($acx_csma_subscribe_details ))
			{
				$acx_csma_subscribe_details = serialize($acx_csma_subscribe_details); 
			}
			update_option('acx_csma_subscribe_user_details', $acx_csma_subscribe_details);
		}
	}
	$acx_csma_message = __("Email Deleted Successfully!.","coming-soon-maintenance-mode-from-acurax");
}	
$acx_csma_subscribe_details=get_option('acx_csma_subscribe_user_details');
	if(is_serialized($acx_csma_subscribe_details ))
	{
		$acx_csma_subscribe_details = unserialize($acx_csma_subscribe_details); 
	}	

if ((ISSET( $_POST['action'] ) && $_POST['action'] == 'bulk_delete') || (ISSET( $_POST['action2'] ) && $_POST['action2'] == 'bulk_delete'))  
{
	$acx_csma_bulk_array=$_POST['acx_csma_checkbox'];
	foreach($acx_csma_subscribe_details as $key1 => $value1)
	{
		foreach($acx_csma_bulk_array as $key2 =>$value2)
		{
			if($value2 - 1 == $key1)
			{
				unset($acx_csma_subscribe_details[$value2 - 1]);
			}
		}
	}  
		$acx_csma_subscribe_details = array_values($acx_csma_subscribe_details);
		if(!is_serialized($acx_csma_subscribe_details))
		{
			$acx_csma_subscribe_details = serialize($acx_csma_subscribe_details); 
		}
		update_option('acx_csma_subscribe_user_details', $acx_csma_subscribe_details);
	$acx_csma_message = __("Email Deleted Successfully!.","coming-soon-maintenance-mode-from-acurax");
}
if($acx_csma_message != "")
{
	echo "<div class='updated'><p><strong>".$acx_csma_message."</strong></p></div>";
}

// Our class extends the WP_List_Table class, so we need to make sure that it's there
if( ! class_exists( 'WP_List_Table' ) ) 
{
    require_once( ABSPATH . 'wp-admin/includes/class-wp-list-table.php' );
}
class  Acx_Csma_My_List_Table extends WP_List_Table 
{
	function __construct()
	{
		global $status, $page;
		parent::__construct( array(
				'singular'  => __( 'email', 'mylisttable' ),     //singular name of the listed records
				'plural'    => __( 'emails', 'mylisttable' ),   //plural name of the listed records
				'ajax'      => false        //does this table support ajax?
								) );
	}
	
	 // here for compatibility with 4.3
    function get_columns()
    {
        // Get options
        return $this->acx_csma_get_columns();
    }
	
	function acx_csma_data()
	{
		$acx_csma_subscribe_details=get_option('acx_csma_subscribe_user_details');

		if($acx_csma_subscribe_details == "")
		{
			$acx_csma_subscribe_details = array();
		} 
		else
		{	 
			if(is_serialized($acx_csma_subscribe_details ))
			{
				$acx_csma_subscribe_details = unserialize($acx_csma_subscribe_details); 
			}	 
		}

		 if(is_serialized($acx_csma_subscribe_details ))
		{
			$acx_csma_subscribe_details = unserialize($acx_csma_subscribe_details); 
		}		 
 
		$acx_csma_subscribe_details_new = array();

		foreach($acx_csma_subscribe_details as $key => $value)
		{	
			$format="Y-m-d";
			$acx_time=date_i18n($format, $value['timestamp']);
			$acx_csma_subscribe_details_new[]=array(
			'ID'=>$key+1,
			'NAME'=>$value['name'],
			'EMAIL'=>sanitize_email($value['email']),
			'IP'=>$value['ip'],
			'TIME'=>$acx_time
			);
		}
		return $acx_csma_subscribe_details_new;
	}
	function acx_csma_get_columns()
	{
		$columns = array(
			'cb'        => '<input type="checkbox" />',
			'ID'     => __('Sl No','coming-soon-maintenance-mode-from-acurax'),
			'NAME'   => __('NAME','coming-soon-maintenance-mode-from-acurax'),
			'EMAIL'  => __('EMAIL','coming-soon-maintenance-mode-from-acurax'),
			'IP'     => __('IP','coming-soon-maintenance-mode-from-acurax'),
			'TIME'   => __('TIME','coming-soon-maintenance-mode-from-acurax')
						);
		return $columns;
	}
	function acx_csma_prepare_items()
	{
		$columns = $this->acx_csma_get_columns();
		$hidden = array();
		$sortable = $this->acx_csma_get_sortable_columns();
		$this->_column_headers = array($columns, $hidden, $sortable);
		$this->items = $this->acx_csma_data();
		usort( $this->items,array( &$this, 'acx_csma_usort_reorder' ) );
	}
	function column_EMAIL($item)
	{
		$actions = array(
				'delete' => sprintf('<a href="?page=%s&action=%s&ID=%s">'.__('Delete','coming-soon-maintenance-mode-from-acurax').'</a>',$_REQUEST['page'],'delete',$item['ID'])
						);
		return sprintf('%1$s %2$s', $item['EMAIL'], $this->row_actions($actions) );
	}
	function acx_csma_get_sortable_columns()
	{
		$sortable_columns = array(
	  		'ID'  => array('ID',false),
			'EMAIL' => array('EMAIL',false),
			'IP' => array('IP',false),
			'TIME' => array('TIME',false)
	  							);
	  return $sortable_columns;
	}
	function column_cb($item) {
        return sprintf(
            '<input type="checkbox" name="acx_csma_checkbox[]" value="%s" />', $item['ID']
        );    
    }
	function get_bulk_actions() {
	  $actions = array(
		'bulk_delete'    => 'Delete'
	  );
	  return $actions;
	}
	function acx_csma_usort_reorder( $a, $b ) 
	{
		// If no sort, default to title
		$orderby = ( ! empty( $_GET['orderby'] ) ) ? $_GET['orderby'] : 'ID';
		// If no order, default to asc
		$order = ( ! empty($_GET['order'] ) ) ? $_GET['order'] : 'asc';
		// Determine sort order
		$result = strnatcmp( $a[$orderby], $b[$orderby] );
		// Send final sort direction to usort
		return ( $order === 'asc' ) ? $result : -$result;
	}
	function no_items() 
	{
		_e( 'No Emails Found !!!!','coming-soon-maintenance-mode-from-acurax');
	}
	function column_default( $item, $column_name ) 
	{
		switch( $column_name )
		{ 
			case 'ID':
			case 'NAME':
			case 'EMAIL':
			case 'IP':
			case 'TIME':
			return $item[ $column_name ];
			default:
			return print_r( $item, true ) ; //Show the whole array for troubleshooting purposes
		}
	}
}
function acx_csma_render_list_page()
{
   $myListTable = new Acx_Csma_My_List_Table();
   echo '<div class="wrap">'; 
   $myListTable->acx_csma_prepare_items(); 
   $myListTable->display(); 
   echo '</div>'; 
}
?>

<div class="main_wrap">
<?php
 echo "<h2>" . __( 'Maintenance Mode Subscribers', 'coming-soon-maintenance-mode-from-acurax' ) . "</h2>";
$acx_csma = str_replace( '%7E', '~', $_SERVER['REQUEST_URI']);
if($acx_csma != "")
{
	$acx_csma = str_replace("action=delete&ID","acurax",$acx_csma);
} ?>
<form name="acurax_popunder_subscribe_form" method="post"  action="<?php echo esc_url($acx_csma); ?>">
<p>		
<?php acx_csma_render_list_page(); ?>
</p>
</form>
</div>
<script type="text/javascript">
jQuery( document ).ready(function() {
 var new_button="<a onclick='acx_csma_subscribe_list();' class='button'><?php _e('Export Current Subscribers','coming-soon-maintenance-mode-from-acurax');?></a>";
 jQuery('.tablenav .bulkactions').append(new_button);
});
function acx_csma_subscribe_list()
{
	if(ajaxurl!="")
	{
		acx_csma_ajaxurl=ajaxurl;
	}
	else
	{
		var acx_csma_ajaxurl ="<?php echo admin_url('admin-ajax.php'); ?>";
	}
	var order = 'action=acx_csma_subscribe_ajax'; 
		jQuery.post(acx_csma_ajaxurl, order, function(theResponse)
		{
			if(theResponse)
			{
				jQuery('<iframe />').attr('src', acx_csma_ajaxurl + '?action=acx_csma_subscribe_ajax').appendTo('body').hide();
			} 
		});
}
</script>