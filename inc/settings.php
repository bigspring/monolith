<?php
/**
 * Monolith by BigSpring
 * Licensed under MIT Open Source
 */
add_action('admin_init', function() {

    // monolith
    register_setting('monolith-group', 'monolith_mode_switch');
    register_setting('monolith-group', 'monolith_default_image');
    register_setting('monolith-group', 'monolith_default_column');

    // content
    register_setting('monolith-group', 'monolith_blog_page_title');
    register_setting('monolith-group', 'monolith_blog_page_introtext');

    // contact
    register_setting('monolith-group', 'monolith_address_1');
    register_setting('monolith-group', 'monolith_address_2');
    register_setting('monolith-group', 'monolith_address_3');
    register_setting('monolith-group', 'monolith_city');
    register_setting('monolith-group', 'monolith_county');
    register_setting('monolith-group', 'monolith_postcode');
    register_setting('monolith-group', 'monolith_country');
    register_setting('monolith-group', 'monolith_phone');

    // social media
    register_setting('monolith-group', 'monolith_facebook');
    register_setting('monolith-group', 'monolith_twitter');
    register_setting('monolith-group', 'monolith_googleplus');
    register_setting('monolith-group', 'monolith_youtube');
    register_setting('monolith-group', 'monolith_linkedin');
    register_setting('monolith-group', 'monolith_pinterest');
    register_setting('monolith-group', 'monolith_instagram');
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

        <div class="row">
            <div class="medium-6 columns">
                <h1>Monolith Settings</h1>
            </div>
        </div>

        <form method="post" action="options.php">

            <?php @settings_fields('monolith-group'); ?>
            <?php @do_settings_sections('monolith-group'); ?>

            <div class="row">
                <div class="medium-6 columns">
                    <h3>Monolith</h3>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>Switch Mode
                        <select name="monolith_mode_switch" id="monolith_mode_switch">
                            <option <?=  ?>>Development</option>
                            <option value="production">Production</option>
                        </select>
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>Default Image
                        <input type="file" name="monolith_default_image" id="monolith_default_image" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>Default Columns
                        <input type="text" name="monolith_default_column" id="monolith_default_column" />
                    </label>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="medium-6 columns">
                    <h3>Content</h3>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>Blog Page Title
                        <input type="text" name="monolith_blog_page_title" id="monolith_blog_page_title" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>Blog Page Intro Text
                        <textarea name="monolith_blog_page_introtext" id="monolith_blog_page_introtext" rows="3"></textarea>
                    </label>
                </div>
            </div>

            <hr>

            <div class="row">
                <div class="small-12 columns">
                    <h3>Contact</h3>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>Address 1
                        <input type="text" name="monolith_address_1" id="monolith_address_1" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>Address 2
                        <input type="text" name="monolith_address_2" id="monolith_address_2" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>Address 3
                        <input type="text" name="monolith_address_3" id="monolith_address_3" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>City
                        <input type="text" name="monolith_city" id="monolith_city" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>County
                        <input type="text" name="monolith_county" id="monolith_county" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>Postcode
                        <input type="text" name="monolith_postcode" id="monolith_postcode" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>Country
                        <input type="text" name="monolith_country" id="monolith_country" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>Phone
                        <input type="text" name="monolith_phone" id="monolith_phone" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="small-12 columns">
                    <h3>Social Media</h3>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>Facebook
                        <input type="text" name="monolith_facebook" id="monolith_facebook" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>Twitter
                        <input type="text" name="monolith_twitter" id="monolith_twitter" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>Google+
                        <input type="text" name="monolith_googleplus" id="monolith_googleplus" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>Youtube
                        <input type="text" name="monolith_youtube" id="monolith_youtube" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>LinkedIn
                        <input type="text" name="monolith_linkedin" id="monolith_linkedin" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>Pinterest
                        <input type="text" name="monolith_pinterest" id="monolith_pinterest" />
                    </label>
                </div>
            </div>

            <div class="row">
                <div class="medium-6 columns">
                    <label>Instagram
                        <input type="text" name="monolith_instagram" id="monolith_instagram" />
                    </label>
                </div>
            </div>

            <?php @submit_button(); ?>

        </form>

        </div>

    <?php
    });
});
