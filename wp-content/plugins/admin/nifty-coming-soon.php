<?php
/*
Plugin Name: Nifty Coming Soon
Plugin URI:  https://wordpress.org/plugins/nifty-coming-soon-and-under-construction-page/
Description: Nice and easy to setup coming soon and under construction / maintenance page that features Responsive design, Countdown timer, Animated text, Google fonts and Background Slider, Subscription form and more. 
Version:     1.0.4
Author:      Davor Demigod
Author URI:  http://themeadviser.com/
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Text Domain: niftycs
*/


defined( 'ABSPATH' ) or die( 'No script kiddies please!' );


// Display status of the coming soon page in the admin bar

add_action('admin_bar_menu', 'nifty_cs_custom_menu', 1000);

function nifty_cs_custom_menu()
{
    global $wp_admin_bar;
	$value=ot_get_option( 'coming_soon_mode_on___off' );
    if ( $value != "off" ) {
		
    $argsParent=array(
        'id' => 'niftycs_custom_menu',
        'title' => 'Nifty Coming Soon Enabled',
        'href' => '?page=niftycs-options#section_general_settings',
		'meta'   => array( 'class' => 'red-hot-button' ),
		
    );
    $wp_admin_bar->add_menu($argsParent);
	}
}

// Coming soon awareness button color

function nifty_cs_admin_custom_colors() {
   echo '<style type="text/css">
           #wp-admin-bar-niftycs_custom_menu a{
	background:#E00103 !important;
-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;

}
#wp-admin-bar-niftycs_custom_menu a:hover {background:inherit !important;
-webkit-transition: all 0.5s ease;
	-moz-transition: all 0.5s ease;
	-o-transition: all 0.5s ease;
	-ms-transition: all 0.5s ease;}
	

         </style>';
}

add_action('admin_head', 'nifty_cs_admin_custom_colors');


// Redirection starts here

function nifty_cs_redirect()
        { 
            
			// Check if the coming soon mode is enabled in the general settings
			
			$value = ot_get_option( 'coming_soon_mode_on___off' );
			
			if ( $value != "off" ) {
            
				if(!is_feed())
				{
                	// Guests are redirected to the coming soon page
	            	if ( !is_user_logged_in()  )
                	{
                        // Path to custom coming soon page
                    	$file = plugin_dir_path(__FILE__).'template/index.php';
	                	include($file);
			        	exit();
                	}
				}
                // Check user assigned role
	            if (is_user_logged_in() )
                {
                    // Get logined in user role
		            global $current_user; 
		            $LoggedInUserID = $current_user->ID;
		            $UserData = get_userdata( $LoggedInUserID );
		            // If user is not 'administrator' redirect him too :)
		            if($UserData->roles[0] != "administrator")
		            {
                        if(!is_feed())
                        {
		                    $file = plugin_dir_path(__FILE__).'template/index.php';
	                       include($file);
			               exit();
		                }
                    }
		        }
            }
        }
	 
// Prevent wp-login.php to be blocked by the coming soon page.
		
add_action('init','nifty_cs_skip_redirect_on_login');

function nifty_cs_skip_redirect_on_login ()

{
	global $pagenow;
	if ('wp-login.php' == $pagenow)
		{
		return;
						
		} else 
			{
			 add_action( 'template_redirect', 'nifty_cs_redirect' );
	
			}
}


// Calling plugins option panel

include_once 'admin/main-options.php';

include_once 'admin/ot-loader.php';

// Calling Google fonts array

include_once 'admin/includes/google-fonts.php';


?>