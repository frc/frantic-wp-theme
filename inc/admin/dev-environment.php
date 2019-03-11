<?php
/**
 * Actions to be taken in DEVELOPMENT
 * Useful for development and staging enviroments
 *
 * Add WP_DEV = true to envs
 */
if (strtolower(getenv('WP_DEV') === 'true' )) {

    /**
     * Force users to login
     *
     * @link https://gist.github.com/richardmtl/a3b7a93131aaeb405990
     */

    if (!function_exists('frc_force_login')) {
        add_action('init', 'frc_force_login');

        function frc_force_login() {

            if (is_user_logged_in()) { return; }

            // List of pages that will not be blocked
            $exclusions = [
                'import-csv',
                'wp-login.php',
                'wp-register.php',
                'wp-cron.php',
                'wp-trackback.php',
                'wp-app.php',
                'xmlrpc.php'
            ];

            if (in_array(basename($_SERVER['PHP_SELF']), apply_filters('frc_force_login', $exclusions))) {
                return;
            }

            auth_redirect();
        }
    }

    /**
     * Add warning message to login
     * Inform the user that they're about to login to a development environment
     *
     * @link http://codex.wordpress.org/Plugin_API/Filter_Reference/login_message
     */

    if (!function_exists('frc_add_development_login_message')) {
        add_filter('login_message', 'frc_add_development_login_message');

        function frc_add_development_login_message($message) {
            return '<p class="message" style="border-left: 4px solid #FFBA00;">' . wp_kses(__('<strong>Note:</strong> You are about to login to a development environment', '_frc'), 'strong') . '</p>';
        }
    }

}
