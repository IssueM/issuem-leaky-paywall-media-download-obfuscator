<?php
/**
 * Main PHP file used to for initial calls to zeen101's Leak Paywall classes and functions.
 *
 * @package zeen101's Leak Paywall - Subscriber Downloads
 * @since 1.0.0
 */
 
/*
Plugin Name: Leaky Paywall - Subscriber Downloads
Plugin URI: http://zeen101.com/
Description: A premium addon for the Leaky Paywall for WordPress plugin.
Author: zeen101 Development Team
Version: 1.0.0
Author URI: http://zeen101.com/
Tags:
*/

//Define global variables...
if ( !defined( 'ZEEN101_STORE_URL' ) )
	define( 'ZEEN101_STORE_URL', 	'http://zeen101.com' );
	
define( 'LP_MDO_NAME', 		'Leaky Paywall - Subscriber Downloads' );
define( 'LP_MDO_SLUG', 		'leaky-paywall-subscriber-downloads' );
define( 'LP_MDO_VERSION', 	'1.0.0' );
define( 'LP_MDO_DB_VERSION', '1.0.0' );
define( 'LP_MDO_URL', 		plugin_dir_url( __FILE__ ) );
define( 'LP_MDO_PATH', 		plugin_dir_path( __FILE__ ) );
define( 'LP_MDO_BASENAME', 	plugin_basename( __FILE__ ) );
define( 'LP_MDO_REL_DIR', 	dirname( LP_MDO_BASENAME ) );

/**
 * Instantiate Pigeon Pack class, require helper files
 *
 * @since 1.0.0
 */
function issuem_leaky_paywall_media_download_obfuscator_plugins_loaded() {
	
	include_once( ABSPATH . 'wp-admin/includes/plugin.php' );
	if ( is_plugin_active( 'issuem/issuem.php' ) )
		define( 'ACTIVE_LP_MDO', true );
	else
		define( 'ACTIVE_LP_MDO', false );

	require_once( 'class.php' );

	// Instantiate the Pigeon Pack class
	if ( class_exists( 'Leaky_Paywall_Subscriber_Downloads' ) ) {
		
		global $leaky_paywall_subscriber_downloads;
		
		$leaky_paywall_subscriber_downloads = new Leaky_Paywall_Subscriber_Downloads();
		
		require_once( 'functions.php' );
			
		//Internationalization
		load_plugin_textdomain( 'issuem-lp-mdo', false, LP_MDO_REL_DIR . '/i18n/' );
			
	}

}
add_action( 'plugins_loaded', 'issuem_leaky_paywall_media_download_obfuscator_plugins_loaded', 4815162342 ); //wait for the plugins to be loaded before init
