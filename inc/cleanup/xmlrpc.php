<?php
/**
 * Disable XMLRPC functionalities
 *
 * @link http://codex.wordpress.org/Function_Reference/bloginfo
 * @link http://codex.wordpress.org/Plugin_API/Action_Reference/wp
 * @link https://developer.wordpress.org/reference/hooks/wp_headers/
 * @link https://developer.wordpress.org/reference/hooks/xmlrpc_call/
 * @link https://developer.wordpress.org/reference/hooks/xmlrpc_enabled/
 * @link https://developer.wordpress.org/reference/hooks/xmlrpc_methods/
 */

// Disable X-Pingback HTTP Header
if (!function_exists('frc_disable_pingback_header')) {
    add_filter('wp_headers', 'frc_disable_pingback_header', 11, 2);

    function frc_disable_pingback_header($headers, $wp_query) {
        if (isset($headers['X-Pingback'])) { unset($headers['X-Pingback']); }
        return $headers;
    }
}

// Hijack pingback_url for get_bloginfo (<link rel="pingback" />)
if (!function_exists('frc_disable_pingback_url')) {
    add_filter('bloginfo_url', 'frc_disable_pingback_url', 11, 2);

    function frc_disable_pingback_url($output, $property) {
        return ($property == 'pingback_url') ? null : $output;
    }
}

// Remove Pingback method
if (!function_exists('frc_remove_xmlrpc_pingback_ping')) {
    add_filter('xmlrpc_methods', 'frc_remove_xmlrpc_pingback_ping');

    function frc_remove_xmlrpc_pingback_ping($methods) {
        unset($methods['pingback.ping']);
        return $methods;
    }
}

// Remove rsd_link from filters (<link rel="EditURI" />)
if (!function_exists('frc_disable_rsd_link')) {
    add_action('wp', 'frc_disable_rsd_link', 9);

    function frc_disable_rsd_link() {
        remove_action('wp_head', 'rsd_link');
    }
}

// Disable specific XMLRPC calls
if (!function_exists('frc_disable_xmlrpc_call')) {
    add_action('xmlrpc_call', 'frc_disable_xmlrpc_call', 1);

    function frc_disable_xmlrpc_call($method) {
        switch ($method) {

            case 'pingback.ping':
                wp_die(
                    'Pingback functionality is disabled on this site',
                    'Pingback disabled', array('response' => 403)
                );
                break;

            default:
                return;
        }
    }
}
