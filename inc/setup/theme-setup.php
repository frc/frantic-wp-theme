<?php
/**
 * Remove height and width attributes from images
 *
 * @link http://css-tricks.com/snippets/wordpress/remove-width-and-height-attributes-from-inserted-images/
 */

if (!function_exists('frc_remove_image_size_attributes')) {
    add_filter('post_thumbnail_html', 'frc_remove_image_size_attributes', 50);
    add_filter('the_content', 'frc_remove_image_size_attributes', 50);
    
    function frc_remove_image_size_attributes($html) {
        $html = preg_replace('/(width|height)="\d*"\s/', '', $html);
    
        return $html;
    }
}

/**
 * Remove links from images by default
 *
 * @link http://andrewnorcross.com/tutorials/stop-hyperlinking-images/
 */

if (!function_exists('frc_remove_image_links')) {
    add_action('admin_init', 'frc_remove_image_links', 10);

    function frc_remove_image_links() {
        $image_set = get_option('image_default_link_type');
        
        if ($image_set !== 'none') {
            update_option('image_default_link_type', 'none');
        }
    }
}