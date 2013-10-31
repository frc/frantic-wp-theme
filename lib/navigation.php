<?php
// As of WP 3.1.1 addition of classes for css styling to parents of custom post types doesn't exist.
// We want the correct classes added to the correct custom post type parent in the wp-nav-menu for 
// css styling and highlighting, so we're modifying each individually...
// The id of each link is required for each one you want to modify.
//
// Note: this is a hack and should be removed once WP handles this stuff properly.

function remove_parent_classes($class)
{
	// check for current page classes, return false if they exist.
	return ($class == 'current_page_item' || $class == 'current_page_parent' || $class == 'current_page_ancestor'  || $class == 'current-menu-item') ? FALSE : TRUE;
}

function add_class_to_wp_nav_menu($classes)
{
	switch (get_post_type())
	{
		case 'event':
			// we're viewing a custom post type, so remove the 'current_page_xxx and current-menu-item' from all menu items.
			$classes = array_filter($classes, "remove_parent_classes");

			// add the current page class to a specific menu item (replace ###).
			if (in_array('menu-item-51', $classes))
			{
				$classes[] = 'current_page_parent';
			}
		break;

		// add more cases if necessary and/or a default
	}
	return $classes;
}
add_filter('nav_menu_css_class', 'add_class_to_wp_nav_menu');
?>