<?php

function queue_scripts_and_styles() {

	/*
	 * NOTE: IE only scripts are included manually in the head.
	 */

	global $wp_styles; // call global $wp_styles variable to add conditional wrapper around ie stylesheet the WordPress way
	if (!is_admin()) {


	  	// CSS

	  	// register main stylesheet
		wp_register_style( 'stylesheet-css', get_stylesheet_directory_uri() . '/css/style.css', array(), '', 'all' );

		// ie-only style sheet
		wp_register_style( 'ie-only-css', get_stylesheet_directory_uri() . '/css/ie.css', array(), '' );



		// JAVASCRIPT IN HEADER

		// comment reply script for threaded comments
		if ( is_singular() AND comments_open() AND (get_option('thread_comments') == 1)) {
			wp_enqueue_script( 'comment-reply' );
		}

		wp_register_script( 'modernizr-js', get_stylesheet_directory_uri() . '/js/vendor/modernizr-2.5.3-min.js', array(), '2.5.3', false );

		

		// JAVASCRIPT IN FOOTER

		// jquery-dependant version:
		//wp_register_script( 'main-js', get_stylesheet_directory_uri() . '/js/main.js', array( 'jquery' ), '', true );

		// vanilla version:
		wp_register_script( 'main-js', get_stylesheet_directory_uri() . '/js/main.js', array(), '', true );



		// QUEUE

		wp_enqueue_script( 'modernizr-js' );
		wp_enqueue_style( 'stylesheet-css' );
		wp_enqueue_style('ie-only-css');

		// Wrap to conditional comments 
		$wp_styles->add_data( 'ie-only-css', 'conditional', 'lt IE 9' );

		// uncomment if you need jquery
		//wp_enqueue_script( 'jquery' );
		wp_enqueue_script( 'main-js' );
		wp_enqueue_script( 'ie-nwmatcher-js' );
		wp_enqueue_script( 'ie-selectivizr-js' );

	}
}

add_action('wp_enqueue_scripts', 'queue_scripts_and_styles', 999);

?>