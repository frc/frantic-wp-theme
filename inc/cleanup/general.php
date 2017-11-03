<?php
if (!function_exists('frc_setup_parent_theme')) {
    add_action('after_setup_theme', 'frc_setup_parent_theme');

    function frc_setup_parent_theme() {

        /**
         * Add default posts and comments RSS feed links to head
         */
        add_theme_support('automatic-feed-links');

        /**
         * Let WordPress manage the document title.
         * By adding theme support, we declare that this theme does not use a
         * hard-coded <title> tag in the document head, and expect WordPress to
         * provide it for us.
         */
        add_theme_support('title-tag');

        /**
         * Add excerpt support for pages
         */
        add_post_type_support('page', 'excerpt');

        /**
         * Add theme support for HTML5 Semantic Markup
         */
        add_theme_support('html5', [
            'search-form',
            'comment-form',
            'comment-list',
            'gallery',
            'caption',
        ]);

        /**
         * Enable support for Post Thumbnails on posts and pages
         */
        add_theme_support('post-thumbnails');
    }
}
