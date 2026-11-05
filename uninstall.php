<?php

if ( ! defined( 'WP_UNINSTALL_PLUGIN' ) ) {
	exit;
}

global $wpdb;

// The main plugin file is not loaded during uninstall, so the table name is written out here.
$table = $wpdb->prefix . 'about_us';
$wpdb->query( "DROP TABLE IF EXISTS $table" );
