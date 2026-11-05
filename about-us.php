<?php
/**
 * Plugin Name: About Us
 */

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}


define( 'ABOUT_US_VERSION', '1.0.0' );
define( 'ABOUT_US_PATH', plugin_dir_path( __FILE__ ) );


define( 'ABOUT_US_TABLE', 'about_us' );
define( 'ABOUT_US_DEFAULT_TITLE', 'About Us' );
define( 'ABOUT_US_DEFAULT_BODY', 'Write a short description here.' );


define( 'ABOUT_US_MENU_TITLE', 'About Us' );
define( 'ABOUT_US_MENU_SLUG', 'about-us' );
define( 'ABOUT_US_MENU_ICON', 'dashicons-info' );
define( 'ABOUT_US_CAPABILITY', 'manage_options' );
define( 'ABOUT_US_NONCE', 'about_us_save' );

require_once ABOUT_US_PATH . 'includes/database.php';
require_once ABOUT_US_PATH . 'includes/admin.php';

register_activation_hook( __FILE__, 'about_us_create_table' );
