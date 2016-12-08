<?php
/* 
Plugin Name: Under Construction / Maintenance Mode From Acurax
Plugin URI: http://www.acurax.com/products/under-construction-maintenance-mode-wordpress-plugin
Description: Simple and the best Coming Soon or Maintenance Mode Plugin Which Supports Practically Unlimited Responsive Designs.
Author: Acurax 
Version: 2.5.1
Author URI: http://wordpress.acurax.com
License: GPLv2 or later
Text Domain: coming-soon-maintenance-mode-from-acurax
*/
/*
This program is free software; you can redistribute it and/or
modify it under the terms of the GNU General Public License
as published by the Free Software Foundation; either version 2
of the License, or (at your option) any later version.

This program is distributed in the hope that it will be useful,
but WITHOUT ANY WARRANTY; without even the implied warranty of
MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
GNU General Public License for more details.

You should have received a copy of the GNU General Public License
along with this program; if not, write to the Free Software
Foundation, Inc., 51 Franklin Street, Fifth Floor, Boston, MA  02110-1301, USA.
*/ 
?>
<?php
/*************** Admin function ***************/
define("ACX_CSMA_CURRENT_VERSION","2.5.1");
define("ACX_CSMA_TOTAL_THEMES",5);
define("ACX_CSMA_BASE_LOCATION",plugin_dir_url( __FILE__ ));

include_once(plugin_dir_path( __FILE__ ).'function.php');
include_once(plugin_dir_path( __FILE__ ).'includes/defaults.php');
include_once(plugin_dir_path( __FILE__ ).'includes/hooks.php');
include_once(plugin_dir_path( __FILE__ ).'includes/hook_functions.php');

	$filename = plugin_dir_path( __FILE__ ) . 'backward_compactability_file.php';
	if( file_exists( $filename  ) === true )
	{	
		include(plugin_dir_path( __FILE__ ).'backward_compactability_file.php');	
	}
	function acx_csma_admin() 
	{
		include(plugin_dir_path( __FILE__ ).'includes/acx_csma_admin.php');
	}
	function acx_csma_subscribers() 
	{
		include(plugin_dir_path( __FILE__ ).'includes/acx_csma_subscribers.php');
	}
	function acx_csma_addons() 
	{
		include(plugin_dir_path( __FILE__ ).'includes/acx_csma_addons.php');
	}

	function acx_csma_misc() 
	{
		include(plugin_dir_path( __FILE__ ).'includes/acx_csma_misc.php');
	}
	
	function acx_csma_display_variable_menu() 
	{
		include(plugin_dir_path( __FILE__ ).'includes/acx_csma_display_variables.php');
	}
	
	function acx_csma_help() 
	{
		include(plugin_dir_path( __FILE__ ).'includes/acx_csma_help.php');
	}

	function acx_csma_expert_support() 
	{
		include(plugin_dir_path( __FILE__ ).'includes/acx_csma_expert_support.php');
	}


	$acx_csma_hide_expert_support_menu = get_option('acx_csma_hide_expert_support_menu');
	if ($acx_csma_hide_expert_support_menu == "") {	$acx_csma_hide_expert_support_menu = "no"; }
	function acx_csma_admin_actions()
	{
		global $acx_csma_hide_expert_support_menu;
		add_menu_page(  __('Maintenance Mode / Coming Soon Configuration','coming-soon-maintenance-mode-from-acurax'), __('Maintenance Mode','coming-soon-maintenance-mode-from-acurax'), 'manage_options', 'Acurax-Coming-Soon-Maintenance-Mode-Settings','acx_csma_admin',plugin_dir_url( __FILE__ ).'/images/admin.png' ); // manage_options for admin
		add_submenu_page('Acurax-Coming-Soon-Maintenance-Mode-Settings', __('Coming Soon/Maintenance From Acurax Subscribers List','coming-soon-maintenance-mode-from-acurax'), __('View All Subscribers','coming-soon-maintenance-mode-from-acurax'), 'manage_options', 'Acurax-Coming-Soon-Maintenance-Mode-Subscribers' ,'acx_csma_subscribers');
		add_submenu_page('Acurax-Coming-Soon-Maintenance-Mode-Settings', __('Coming Soon/Maintenance From Acurax Misc Settings','coming-soon-maintenance-mode-from-acurax'), __('Misc','coming-soon-maintenance-mode-from-acurax'), 'manage_options', 'Acurax-Coming-Soon-Maintenance-Mode-Misc' ,'acx_csma_misc');
		
		add_submenu_page('Acurax-Coming-Soon-Maintenance-Mode-Settings', __('Coming Soon/Maintenance From Acurax Available Add-ons','coming-soon-maintenance-mode-from-acurax'), __('Add-ons','coming-soon-maintenance-mode-from-acurax'), 'manage_options', 'Acurax-Coming-Soon-Maintenance-Mode-Add-ons' ,'acx_csma_addons');
		
		if($acx_csma_hide_expert_support_menu == "no") {
		add_submenu_page('Acurax-Coming-Soon-Maintenance-Mode-Settings', __('Acurax Expert Support','coming-soon-maintenance-mode-from-acurax'), __('Expert Support','coming-soon-maintenance-mode-from-acurax'), 'manage_options', 'Acurax-Coming-Soon-Maintenance-Mode-Expert-Support' ,'acx_csma_expert_support');
		}
		add_submenu_page('Acurax-Coming-Soon-Maintenance-Mode-Settings', __('Coming Soon/Maintenance From Acurax Display Variables','coming-soon-maintenance-mode-from-acurax'), __('Display Variables','coming-soon-maintenance-mode-from-acurax'), 'manage_options', 'Acurax-Coming-Soon-Maintenance-Mode-Variables' ,'acx_csma_display_variable_menu');
		
		add_submenu_page('Acurax-Coming-Soon-Maintenance-Mode-Settings', __('Coming Soon/Maintenance From Acurax Help and Support','coming-soon-maintenance-mode-from-acurax'), __('Help','coming-soon-maintenance-mode-from-acurax'), 'manage_options', 'Acurax-Coming-Soon-Maintenance-Mode-Help' ,'acx_csma_help');
	}
	if ( is_admin() )
	{
		add_action('admin_menu', 'acx_csma_admin_actions');
	}
	include_once(plugin_dir_path( __FILE__ ).'includes/updates.php');
?>