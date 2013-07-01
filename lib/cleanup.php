<?php
// remove junk from head

function cleanup() {
	remove_action('wp_head', 'rsd_link');
	//remove_action('wp_head', 'wp_generator'); // This is not needed if the method below is used.
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'wlwmanifest_link');
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);

	if( !is_admin()){
	    wp_deregister_script('jquery');
	}
}

add_action('init', 'cleanup');


// Remove version number from everywhere.
function wpbeginner_remove_version() {
	return '';
}

add_filter('the_generator', 'wpbeginner_remove_version');

?>