<?php 
/**
  Plugin Name: WP File Manager
  Plugin URI: https://wordpress.org/plugins/wp-file-manager
  Description: Manage your WP files.
  Author: mndpsingh287
  Version: 1.2
  Author URI: https://profiles.wordpress.org/mndpsingh287
  License: GPLv2
**/
if(!class_exists('mk_file_folder_manager')):	
	class mk_file_folder_manager
	{
		/* Auto Load Hooks */
		public function __construct()
		{
			 add_action('admin_menu', array(&$this, 'ffm_menu_page'));
			 add_action( 'admin_enqueue_scripts', array(&$this,'ffm_admin_things'));
			 add_action( 'wp_ajax_mk_file_folder_manager', array(&$this, 'mk_file_folder_manager_action_callback'));
			 add_action( 'wp_ajax_nopriv_mk_file_folder_manager', array(&$this, 'mk_file_folder_manager_action_callback') );
			 add_filter( 'plugin_action_links', array(&$this, 'mk_file_folder_manager_action_links'), 10, 2 );
		}
		/* Menu Page */
		public function ffm_menu_page()
		{
			 add_menu_page(
			__( 'WP File Manager', 'ffm' ),
			__( 'WP File Manager', 'ffm' ),
			'manage_options',
			'wp_file_manager',
			array(&$this, 'ffm_settings_callback'),
			plugins_url( 'images/wp_file_manager.png', __FILE__ )
			);
			/* Only for admin */
			add_submenu_page( 'wp_file_manager', 'Settings', 'Settings', 'manage_options', 'wp_file_manager_settings', array(&$this, 'wp_file_manager_settings'));
			/* Only for admin */
			add_submenu_page( 'wp_file_manager', 'Shortcode - PRO', 'Shortcode - PRO', 'manage_options', 'wp_file_manager_shortcode_doc', array(&$this, 'wp_file_manager_shortcode_doc'));
		}
		/* Main Role */
		public function ffm_settings_callback()
		{ 
			if(is_admin()):
			 include('lib/wpfilemanager.php');
			endif;
		}
		/*Settings */
		public function wp_file_manager_settings()
		{
			if(is_admin()):
			 include('inc/settings.php');
			endif;
		}
		/* Shortcode Doc */
		public function wp_file_manager_shortcode_doc()
		{
		   if(is_admin()):		  
			 include('inc/shortcode_docs.php');
			endif;	
		}
		/* Admin  Things */
		public function ffm_admin_things()
		{
				$getPage = isset($_GET['page']) ? $_GET['page'] : '';
				$allowedPages = array(
									  'wp_file_manager'
									  );
					if(!empty($getPage) && in_array($getPage, $allowedPages)):
						wp_enqueue_style( 'jquery-ui', plugins_url('css/jquery-ui.css', __FILE__));
						wp_enqueue_style( 'elfinder.min', plugins_url('lib/css/elfinder.min.css', __FILE__)); 
						wp_enqueue_style( 'theme', plugins_url('lib/css/theme.css', __FILE__));
						wp_enqueue_script( 'jquery_min', plugins_url('js/jquery-ui.min.js', __FILE__));	
						wp_enqueue_script( 'elfinder_min', plugins_url('lib/js/elfinder.min.js',  __FILE__ ));	
					endif;				
		}
		/*
		* Admin Links
		*/
		public function mk_file_folder_manager_action_links($links, $file)
		{
		if ( $file == plugin_basename( __FILE__ ) ) {
				$mk_file_folder_manager_links = '<a href="http://www.webdesi9.com/product/file-manager/" title="Buy Pro Now" target="_blank" style="font-weight:bold">'.__('Buy Pro').'</a>';
				$mk_file_folder_manager_donate = '<a href="http://www.webdesi9.com/donate/?plugin=wp-file-manager" title="Donate Now" target="_blank" style="font-weight:bold">'.__('Donate').'</a>';
				array_unshift( $links, $mk_file_folder_manager_donate );
				array_unshift( $links, $mk_file_folder_manager_links );
			}
		
			return $links;	
		}
		/*
		* Ajax request handler
		* Run File Manager
		*/
		public function mk_file_folder_manager_action_callback()
		{
					require 'lib/php/autoload.php';
					$opts = array(
				   'debug' => false,
				   'roots' => array(
					array(
						'driver'        => 'LocalFileSystem',           // driver for accessing file system (REQUIRED)
						'path'          => ABSPATH, // path to files (REQUIRED)
						'URL'           => site_url(), // URL to files (REQUIRED)
						'uploadDeny'    => array(),                // All Mimetypes not allowed to upload
						'uploadAllow'   => array('image', 'text/plain'),// Mimetype `image` and `text/plain` allowed to upload
						'uploadOrder'   => array('deny', 'allow'),      // allowed Mimetype `image` and `text/plain` only
						'accessControl' => 'access'                     // disable and hide dot starting files (OPTIONAL)
					)
				)
			);
			//run elFinder
			$connector = new elFinderConnector(new elFinder($opts));
			$connector->run();
			die;
		}
	}
	new mk_file_folder_manager;	
	/* end class */	
endif;	