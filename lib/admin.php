<?php

/* 
 * Customizations to admin
 *
 * Reorder admin menu
 * Custom styles to editor
 *
*/

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



/**
 * Custom styles dropdown to editor
 */
 
/*add_filter( 'mce_buttons_2', 'my_mce_buttons_2' );

function my_mce_buttons_2( $buttons ) {
	array_unshift( $buttons, 'styleselect' );
	return $buttons;
}


// add styles - more info: http://alisothegeek.com/2011/05/tinymce-styles-dropdown-wordpress-visual-editor/
add_filter( 'tiny_mce_before_init', 'my_mce_before_init' );

function my_mce_before_init( $settings ) {

	$style_formats = array(
	  array(
		'title' => 'Lead text',
		'selector' => 'p',
		'classes' => 'lead'
	  ),
	  array(
		'title' => 'Button',
		'selector' => 'a',
		'classes' => 'btn'
	  )
	);

	$settings['style_formats'] = json_encode( $style_formats );

	return $settings;

}*/



/**
 * Custom styles to editor
 */

/*function my_theme_add_editor_styles() {
	add_editor_style( 'assets/css/custom-editor-style.css' );
}
add_action( 'init', 'my_theme_add_editor_styles' );*/


?>
