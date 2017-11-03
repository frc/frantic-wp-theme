<?php
/**
 * _frc parent theme setup
 *
 * @package _frc
 */

/**
 * Theme setup
 */
require_once get_template_directory() . '/inc/setup/theme-setup.php';

/**
 * Admin setup
 */
require_once get_template_directory() . '/inc/admin/dev-environment.php';

/**
 * Cleanup
 */
require_once get_template_directory() . '/inc/cleanup/general.php';
require_once get_template_directory() . '/inc/cleanup/emojis.php';
require_once get_template_directory() . '/inc/cleanup/update-checks.php';
require_once get_template_directory() . '/inc/cleanup/xmlrpc.php';

/**
 * Plugins
 */
require_once get_template_directory() . '/inc/plugins/tinymce.php';
require_once get_template_directory() . '/inc/plugins/gforms.php';
