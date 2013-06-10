<?php	

// Stuff in external files
require_once('lib/cleanup.php'); 
require_once('lib/scripts_and_styles.php'); 
require_once('lib/disable_pingback.php');


// add RSS links to <head> section

add_theme_support('automatic_feed_links');

// thumbnail & menu support


add_theme_support('post-thumbnails');
add_theme_support('menus');
add_theme_support('automatic-feed-links');


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


// add excerpt to pages

//add_post_type_support('page', 'excerpt');




// register navigation

register_nav_menu('main', 'main');


// Custom thumbnails
/*
if (function_exists('add_image_size')){ 
	//add_image_size('gallery', 300, 200, true);
	//add_image_size( 'masonry-img', 320, 9999 ); 
}
*/

// remove links emnu
/*
function remove_menu_items() {
  global $menu;
  $restricted = array(__('Links'), __('Comments'));
  end ($menu);
  while (prev($menu)){
    $value = explode(' ',$menu[key($menu)][0]);
    if(in_array($value[0] != NULL?$value[0]:"" , $restricted)){
      unset($menu[key($menu)]);}
    }
  }

add_action('admin_menu', 'remove_menu_items');

// detect browser (if for some reason you need a special hack)

/*
add_filter('body_class','browser_body_class');
function browser_body_class($classes) {
	global $is_lynx, $is_gecko, $is_IE, $is_opera, $is_NS4, $is_safari, $is_chrome, $is_iphone;
	if($is_lynx) $classes[] = 'lynx';
	elseif($is_gecko) $classes[] = 'mozilla';
	elseif($is_opera) $classes[] = 'opera';
	elseif($is_NS4) $classes[] = 'ns4';
	elseif($is_safari) $classes[] = 'safari';
	elseif($is_chrome) $classes[] = 'chrome';
	elseif($is_IE) $classes[] = 'ie';
	else $classes[] = 'browser-unknown';
	if($is_iphone) $classes[] = 'iphone';
	return $classes;
}
*/



?>