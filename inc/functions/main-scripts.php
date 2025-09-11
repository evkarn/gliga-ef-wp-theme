<?php
/**
 * Enqueue scripts and styles.
 */
function main_scripts() {
	wp_enqueue_style( 'main-style', get_stylesheet_uri(), array(), _S_VERSION );
	wp_style_add_data( 'main-style', 'rtl', 'replace' );

	wp_enqueue_script( 'main-navigation', get_template_directory_uri() . '/js/navigation.min.js', array(), _S_VERSION, true );

	wp_enqueue_script( 'main-scripts', get_template_directory_uri() . '/js/scripts.min.js', array(), _S_VERSION, true );

	if ( is_singular() && comments_open() && get_option( 'thread_comments' ) ) {
		wp_enqueue_script( 'comment-reply' );
	}
}
add_action( 'wp_enqueue_scripts', 'main_scripts' );