<?php
/**
 * Remove Update Core message from Dashboard
 */

if (!function_exists('frc_hide_wordpress_update_notices')) {
    add_action( 'admin_menu', 'frc_hide_wordpress_update_notices' );

    function frc_hide_wordpress_update_notices() {
        remove_action( 'admin_notices', 'update_nag', 3 );
    }
}

/**
 * Disable admin calling home
 */

if (!function_exists('frc_disable_update_checks')) {
    add_action('frc_disable_update_checks', 'frc_disable_update_checks');

    function frc_disable_update_checks() {
        remove_action('admin_init', '_maybe_update_core');
        remove_action('wp_version_check', 'wp_version_check');

        remove_action('load-plugins.php', 'wp_update_plugins');
        remove_action('load-update.php', 'wp_update_plugins');
        remove_action('load-update-core.php', 'wp_update_plugins');
        remove_action('admin_init', '_maybe_update_plugins');
        remove_action('wp_update_plugins', 'wp_update_plugins');

        remove_action('load-themes.php', 'wp_update_themes');
        remove_action('load-update.php', 'wp_update_themes');
        remove_action('load-update-core.php', 'wp_update_themes');
        remove_action('admin_init', '_maybe_update_themes');
        remove_action('wp_update_themes', 'wp_update_themes');

        remove_action('update_option_WPLANG', 'wp_clean_update_cache');

        remove_action('wp_maybe_auto_update', 'wp_maybe_auto_update');

        remove_action('init', 'wp_schedule_update_checks');
        remove_action('init', 'wp_check_browser_version');
    }

    do_action('frc_disable_update_checks');
}
