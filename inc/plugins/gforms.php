<?php
/**
 * Disable Gravity Forms stylesheets and enable HTML5
 */

if (!function_exists('frc_set_gforms_settings')) {
    add_action('after_switch_theme', 'frc_set_gforms_settings');

    function frc_set_gforms_settings() {
        update_option('rg_gforms_disable_css', true);
        update_option('rg_gforms_enable_html5', true);
    }
}

/**
 * Allow Gravity Forms access to 'editor' role
 */

if (!function_exists('frc_add_gforms_enable_editor_role')) {
    add_action('admin_init', 'frc_add_gforms_enable_editor_role');

    function frc_add_gforms_enable_editor_role() {
        $role = get_role('editor');
        $role->add_cap('gform_full_access');
    }
}

/**
 * Disable default admin notification
 *
 * @link https://docs.gravityforms.com/gform_default_notification/
 */

add_filter('gform_default_notification', '__return_false');

/**
 * Override default notification_from value {admin_email} with empty string
 */

if (!function_exists('frc_override_gforms_notification_default_sender')) {
    add_filter('gform_notification_ui_settings', 'frc_override_gforms_notification_default_sender', 10, 3);

    function frc_override_gforms_notification_default_sender($ui_settings, $notification, $form) {
        if (isset($ui_settings['notification_from'])) {
            $ui_settings['notification_from'] = str_replace('{admin_email}', '', $ui_settings['notification_from']);
        }

        return $ui_settings;
    }
}

/**
 * Automatically set settings for new forms
 *
 * @param $form
 * @param $is_new
 */

if (!function_exists('frc_force_gforms_settings')) {
    add_action('gform_after_save_form', 'frc_force_gforms_settings', 10, 2);

    function frc_force_gforms_settings($form, $is_new) {
        if ($is_new) {
            // Enable honeypot
            $form['enableHoneypot'] = true;

            // Set labels above
            $form['subLabelPlacement'] = 'above';

            // Set descriptions above
            $form['descriptionPlacement'] = 'above';

            // Form inactivates automatically if we don't force it active
            // http://inlinedocs.gravityhelp.com/source-class-GFAPI.html#209
            $form['is_active'] = true;

            GFAPI::update_form($form);
        }
    }
}

/**
 * Disable bad Gravity Forms field types
 */

if (!function_exists('frc_disable_bad_gforms_fields')) {
    add_filter('gform_add_field_buttons', 'frc_disable_bad_gforms_fields');

    function frc_disable_bad_gforms_fields($field_groups) {
        $disable = [
            'standard_fields' => ['list'],
            'advanced_fields' => ['name', 'address']
        ];

        foreach ($field_groups as $gkey => $field_group) {
            if (!isset($disable[$field_group['name']])) continue;

            foreach ($field_group['fields'] as $key => $field) {
                if (in_array($field['data-type'], $disable[$field_group['name']])) {
                    unset($field_groups[$gkey]['fields'][$key]);
                }
            }
        }

        return array_values($field_groups);
    }
}

/**
 * Bypass Gravity Forms secure link generation because of the S3 integration
 *
 * @link https://www.gravityhelp.com/documentation/article/gform_secure_file_download_location/
 */

add_filter('gform_secure_file_download_location', '__return_false', 10, 3);
