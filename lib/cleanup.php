<?php

/**
 * Cleanup ’head’
 */
function cleanup() {
	remove_action('wp_head', 'adjacent_posts_rel_link', 10, 0);
	remove_action('wp_head', 'feed_links', 2);
	remove_action('wp_head', 'feed_links_extra', 3);
	remove_action('wp_head', 'index_rel_link');
	remove_action('wp_head', 'parent_post_rel_link', 10, 0);
	remove_action('wp_head', 'rsd_link');
	remove_action('wp_head', 'start_post_rel_link', 10, 0);
	remove_action('wp_head', 'wlwmanifest_link');

	//wp_deregister_script('jquery');
}
add_action('init', 'cleanup');


/**
 * Remove version number everywhere
 */
function remove_version_info() {
	return '';
}
add_action('the_generator', 'remove_version_info');


/**
 * Remove WPML language css
 */

/*define('ICL_DONT_LOAD_LANGUAGE_SELECTOR_CSS', true);*/

?>
