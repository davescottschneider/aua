<?php
/*
Plugin Name: Alternate User Admin
Plugin URI:  http://davescottschneider.com/alternate-user-admin
Description: This plugin creates a new user admin page for adding new posts that looks nothing like the back end of wordpress.
Version:     1.0
Author:      Dave Scott Schneider
Author URI:  http://davescottschneider.com
License:     GPL2
License URI: https://www.gnu.org/licenses/gpl-2.0.html
Domain Path: /languages
Text Domain: alternate-user-admin
*/
if ( !defined( 'ABSPATH' ) ) exit;

register_activation_hook( __FILE__, 'aua_init' );

function aua_init() {
	// Insert code to initiate plugin
}

/** Step 2 (from text above). */
add_action( 'admin_menu', 'aua_addmenu' );

/** Step 1. */
function aua_addmenu() {
	add_options_page( 'Alternate User Admin Options', 'Alternate User Admin', 'manage_options', 'alternate_user_admin', 'aua_options' );
}
add_action( 'admin_init', 'aua_register_settings' );

function aua_register_settings() {
	$post_types = get_post_types( '', 'names' ); 

	foreach ( $post_types as $post_type ) {
		register_setting( 
			'aua_options_group', // Option group
			'aua-'. $post_type // Option name
		); 
	}
}
/** Step 3. */
function aua_options() {
	if ( !current_user_can( 'manage_options' ) )  {
		wp_die( __( 'You do not have sufficient permissions to access this page.' ) );
	}
	$path = plugin_dir_path( __FILE__ ) . '/admin/aua-options.php';
	include_once($path);
	
}

// function alternate_user_admin_deactivate() {
 
//     // Our post type will be automatically removed, so no need to unregister it
 
//     // Clear the permalinks to remove our post type's rules
//     flush_rewrite_rules();
 
// }
// register_deactivation_hook( __FILE__, 'alternate_user_admin_deactivat' );