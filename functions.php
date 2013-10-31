<?php	

// Stuff in external files
require_once('lib/cleanup.php'); 
require_once('lib/scripts_and_styles.php'); 
require_once('lib/disable_pingback.php');
require_once('lib/post_types_and_taxonomies.php');
//require_once('lib/navigation.php');


// add RSS links to <head> section

add_theme_support('automatic_feed_links');

// thumbnail & menu support


add_theme_support('post-thumbnails');
add_theme_support('menus');
add_theme_support('automatic-feed-links');





// add excerpt to pages

//add_post_type_support('page', 'excerpt');




// register navigation

register_nav_menu('main', 'main');


// Reorder admin menu
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