<?php

if ( ! defined( 'ABSPATH' ) ) {
	exit;
}

$title = $row ? $row->title : '';
$body  = $row ? $row->body : '';
?>

<div class="wrap">

	<h1><?php echo esc_html( ABOUT_US_MENU_TITLE ); ?></h1>

	<?php if ( $message ) { ?>
		<div class="notice notice-info"><p><?php echo esc_html( $message ); ?></p></div>
	<?php } ?>

	<form method="post">
		<?php wp_nonce_field( ABOUT_US_NONCE ); ?>

		<p>
			<label for="about_us_title">Title</label><br>
			<input type="text" id="about_us_title" name="about_us_title" class="regular-text" value="<?php echo esc_attr( $title ); ?>">
		</p>

		<p>
			<label for="about_us_body">Description</label><br>
			<textarea id="about_us_body" name="about_us_body" rows="5" class="large-text"><?php echo esc_textarea( $body ); ?></textarea>
		</p>

		<button type="submit" class="button button-primary">Save</button>
	</form>

	<hr>

	<h2><?php echo esc_html( $title ); ?></h2>
	<p style="white-space: pre-line;"><?php echo esc_html( $body ); ?></p>

</div>
