<?php
/**
 * WebKite Lists in Editor.
 *
 */
 
function webkite_editor_button() {
  if ( !current_user_can('edit_posts') && !current_user_can('edit_pages') )
    return;
  
  if ( get_user_option('rich_editing') == 'true' ) {
    add_filter( "mce_external_plugins", "webkite_add_editor_button" );
    add_filter( 'mce_buttons', 'webkite_register_editor_button' );
  }
}
add_action( 'admin_init', 'webkite_editor_button' );


function webkite_load_dialog_styles(){
  wp_enqueue_style('webkite_editor_dialog_css');
}
add_action( 'admin_enqueue_scripts', 'webkite_load_dialog_styles' );  


function webkite_add_editor_button( $plugin_array ) {
  $plugin_array['webkite'] = WEBKITE_RESULTS_URL . 'js/webkite_editor_button.js';
  return $plugin_array;
}

function webkite_register_editor_button( $button ) {
  array_push( $button, 'webkite_lists' );
  return $button;
}


/*
 * Render Dialog content
 * located in views/webkite-editor-dialog.php
 */
function webkite_add_editor_dialog(){
  echo wk_render_view('webkite-editor-dialog');
}
add_action( 'admin_footer', 'webkite_add_editor_dialog' );
 
 
/* 
 * print out script for dialog and some variables used
 * prints in head
 */
function webkite_editor_dialog(){
  echo "<script type='text/javascript'>\n";
  ?>
  jQuery(document).ready(function($){
    $(function() {
      $("#webkite-list-dialog").dialog({
        autoOpen: false,
        modal: true,
        dialogClass: 'wp-dialog',
        resizable: false,
        buttons:[
          {
            text: 'Cancel',
            'class': 'button',
            click: function(){
              $(this).dialog('close');
            }
          },{
            text: 'Insert',
            'class': 'button button-primary',
            click: function(){
              $(this).dialog("close");
              var selectedlist = window.jc_uuid;
              var postID = $('#post_ID').val();
              if (selectedlist == '' || selectedlist == 'show insert' || selectedlist == 'hide insert'){
                return;
              }
              
              var node = webkite_canvas.selection.getNode();
              var insert_list = '[webkite id=' + selectedlist + ']';
              if(node.nodeName != 'BODY' && node.innerHTML != '<br>' && node.innerHTML != '<br data-mce-bogus="1">') {
                var p = node;
                
                while(p.parentNode.nodeName != 'BODY')
                  p = p.parentNode;
                
                var block = webkite_canvas.dom.create('div',{}, insert_list);
                webkite_canvas.dom.insertAfter(block.firstChild, p);
                
              } else {
                webkite_canvas.execCommand('mceInsertContent', false, insert_list);          
              }
              
              $.ajax({
                type: 'POST',
                url: ajaxurl,
                data: {
                  action: 'webkite_set_list_relationship_ajax',
                  list_id: selectedlist,
                  post_id: postID
                }
              });
              
              $('#webkite_list_selector').prop('selectedIndex', 0);
            }
          }
        ],
        width:450,
        minWidth:360,
        maxWidth:600,
        open: function(){
          if ($('#webkite_list_selector').is(':disabled')){
            $('#webkite-list-dialog').closest('.ui-dialog').find('.button-primary').hide();
          }
        }
      });
    });
  });
  var webkite_canvas;
  var webkite_editor_icon = '<?php echo WEBKITE_RESULTS_URL . 'images/mce_webkite_lists.png' ?>';
  <?php
  echo "</script>\n";
}
add_action('admin_head', 'webkite_editor_dialog');

function webkite_enqueue_editor_assets(){
  wp_enqueue_script('jquery-ui-dialog');
  wp_enqueue_script('jquery-ui-tabs');
  wp_enqueue_style('wp-jquery-ui-dialog');
  wp_enqueue_script('webkite_editor_js');
}
add_action( 'admin_init', 'webkite_enqueue_editor_assets' );
