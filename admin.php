<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

add_action( 'admin_menu', 'about_us_add_menu' );

function about_us_add_menu() {
	add_menu_page(
		ABOUT_US_MENU_TITLE,
		ABOUT_US_MENU_TITLE,
		ABOUT_US_CAPABILITY,
		ABOUT_US_MENU_SLUG,
		'about_us_show_admin_page',
		ABOUT_US_MENU_ICON
	);
}

function about_us_show_admin_page() {
	if ( ! current_user_can( ABOUT_US_CAPABILITY ) ) {
		return;
	}

	$message = about_us_handle_save();
	$row     = about_us_get_row();

	require ABOUT_US_PATH . 'admin/views/admin-page.php';
}

function about_us_handle_save() {
	if ( ! isset( $_POST['about_us_title'] ) ) {
		return '';
	}

	check_admin_referer( ABOUT_US_NONCE );

	$title = sanitize_text_field( wp_unslash( $_POST['about_us_title'] ) );
	$body  = sanitize_textarea_field( wp_unslash( $_POST['about_us_body'] ?? '' ) );

	if ( '' === $title ) {
		return 'Please enter a title.';
	}

	if ( false === about_us_save_row( $title, $body ) ) {
		return 'Could not save. Please try again.';
	}

	return 'Saved.';
}
