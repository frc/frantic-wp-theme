<?php
/**
 * Always show second bar
 */

if (!function_exists('frc_show_tinymce_toolbar')) {
    add_filter('tiny_mce_before_init', 'frc_show_tinymce_toolbar');

    function frc_show_tinymce_toolbar($settings) {
        $settings['wordpress_adv_hidden'] = false;
    
        return $settings;
    }
}

/*
 * Enable style select
 */

if (!function_exists('frc_show_tinymce_buttons_2')) {
    add_filter('mce_buttons_2', 'frc_show_tinymce_buttons_2');

    function frc_show_tinymce_buttons_2($buttons) {
        array_unshift($buttons, 'styleselect');
    
        return $buttons;
    }
}

/**
 * Remove redundant buttons
 */

if (!function_exists('frc_remove_tinymce_buttons1')) {
    add_filter('mce_buttons', 'frc_remove_tinymce_buttons1');

    function frc_remove_tinymce_buttons1($buttons) {
        // Remove more separator and second bar toggle
        $remove = ['wp_more', 'wp_adv'];
    
        return array_diff($buttons, $remove);
    }
}

if (!function_exists('frc_remove_tinymce_buttons2')) {
    add_filter('mce_buttons_2', 'frc_remove_tinymce_buttons2');

    function frc_remove_tinymce_buttons2($buttons) {
        // Remove text color selector, outdent and indent
        $remove = ['forecolor', 'outdent', 'indent'];
    
        return array_diff($buttons, $remove);
    }
}

/**
 *  Remove the h1 tag from the WordPress editor.
 */

if (!function_exists('frc_remove_tinymce_h1')) {
    add_filter('tiny_mce_before_init', 'frc_remove_tinymce_h1');

    function frc_remove_tinymce_h1($settings) {
        $settings['block_formats'] = 'Paragraph=p;Heading 2=h2;Heading 3=h3;Heading 4=h4;Heading 5=h5;Heading 6=h6;Preformatted=pre;';
    
        return $settings;
    }
}
