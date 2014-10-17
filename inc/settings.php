<?php
/**
 * Monolith by BigSpring
 * Licensed under MIT Open Source
 */

add_action('admin_init', function() {

    // monolith
    register_setting('monolith-group', 'mode_switch');
    register_setting('monolith-group', 'default_image');
    register_setting('monolith-group', 'default_column');

    // contact
    register_setting('monolith-group', 'address_1');
    register_setting('monolith-group', 'address_2');
    register_setting('monolith-group', 'address_3');
    register_setting('monolith-group', 'city');
    register_setting('monolith-group', 'county');
    register_setting('monolith-group', 'postcode');
    register_setting('monolith-group', 'country');
    register_setting('monolith-group', 'phone');

    // social media
    register_setting('monolith-group', 'facebook');
    register_setting('monolith-group', 'twitter');
    register_setting('monolith-group', 'googleplus');
    register_setting('monolith-group', 'youtube');
    register_setting('monolith-group', 'linkedin');
    register_setting('monolith-group', 'pinterest');
    register_setting('monolith-group', 'instagram');
});

add_action('admin_menu', function() {
    add_options_page('Monolith Settings', 'Monolith', 'manage_options', 'monolith_settings', function() {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }
        wp_enqueue_style('foundation-css', get_template_directory_uri().'/assets/bower_components/foundation/css/foundation.css');
        wp_enqueue_script('foundation-js', get_template_directory_uri().'/assets/bower_components/foundation/js/foundation.min.js', 'jquery');
        ?>

        <div class="wrap">
            <h2>Monolith Settings</h2>
        </div>

        <?php
    });
});