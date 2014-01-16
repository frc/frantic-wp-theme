<?php

/**
 * External libs for cleanup, registerings scripts, etc.
 */
require_once('lib/cleanup.php'); 
require_once('lib/scripts.php'); 
require_once('lib/disable_pingback.php');
require_once('lib/post_types_and_taxonomies.php');
// require_once('lib/navigation.php');


/**
 * Theme feature(s) support.
 */
add_theme_support('automatic-feed-links');
add_theme_support('menus');
add_theme_support('post-thumbnails');

// add_post_type_support('page', 'excerpt');


/**
 * Register menu(s).
 */
register_nav_menu('main', 'main');


/**
 * Reorder admin menu.
 */
function custom_menu_order($menu_ord) {
	if (!$menu_ord) return true;

	return array(
		'index.php', // Dashboard
		'separator1', // First separator
		'edit.php?post_type=page', // Pages
		'edit.php', // Posts
		// Add custom post types here like this:
		// 'edit.php?post_type=event',
		// Gravity forms:
		// 'admin.php?page=gf_edit_forms',
		'upload.php', // Media
		'edit-comments.php', // Comments
		'separator2', // Second separator
		'themes.php', // Appearance
		'plugins.php', // Plugins
		'users.php', // Users
		'tools.php', // Tools
		'options-general.php', // Settings
		'separator-last', // Last separator
	);
}
add_filter('custom_menu_order', 'custom_menu_order'); // Activate custom_menu_order
add_filter('menu_order', 'custom_menu_order');


?>