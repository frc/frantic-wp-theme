<?php

/* 
 * Add all your Custom Post Types and Custom Taxonomies here.
 * You might want to use an online tool in http://generatewp.com/post-type/ to 
 * create Custom Post Types scripts.
 *
 * If you have multiple languages, you might be better off using WPML's Types
 * add on. It makes translating Custom Post Types and Taxonomies easier.
 * If you choose to do so, just comment out a reference in functions.php to this file.
 *
*/



// new taxonomy

/*function cases_init() {
	// create a new taxonomy
	register_taxonomy(
		'cases',
		'works',
		array(
			'hierarchical' => true,
			'label' => __('Cases'),
			'sort' => true,
			'args' => array('orderby' => 'term_order'),
			'rewrite' => array('slug' => 'cases')
		)
	);
}
add_action( 'init', 'cases_init' );
*/


// custom post type

/*
add_action('init', 'create_post_type');

function create_post_type() {
	register_post_type( 'custom-post-type',
		array(
			'labels' => array(
				'name' => _x('custom-post-type', 'post type general name'),
				'singular_name' => _x('custom-post-type', 'post type singular name'),
			    'add_new' => _x('Add new', 'custom-post-type'),
			    'add_new_item' => __('Add new custom-post-type'),
		    	'edit_item' => __('Edit item'),
    			'new_item' => __('New custom-post-type'),
			    'all_items' => __('All custom-post-type'),
    			'view_item' => __('Show custom-post-type'),
			    'search_items' => __('Find custom-post-type'),
		    	'not_found' =>  __('Not found'),
	    		'not_found_in_trash' => __('Nothing in trash'), 
    			'parent_item_colon' => '',
			    'menu_name' => 'custom-post-type'
			),
			'public' => true,
		    'publicly_queryable' => true,
    		'show_ui' => true, 
		    'show_in_menu' => true, 
    		'query_var' => true,
			//'rewrite' => array('slug' => 'something'),
	    	'capability_type' => 'post',
			'has_archive' => true,
    		'hierarchical' => false,
			'menu_position' => 5,
			'supports' => array('title', 'editor', 'excerpt', 'custom-fields', 'author', 'thumbnail', 'comments'),
			'taxonomies' => array('post_tag','category')
		)
	);
		
}
*/
?>