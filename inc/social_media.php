<?php
/**
 * Monolith by BigSpring
 * @license MIT http://opensource.org/licenses/MIT
 */

/**
 * Init settings
 */
add_action('admin_init', function() {

    // social media
    register_setting('monolith-social-group', 'monolith_facebook');
    register_setting('monolith-social-group', 'monolith_twitter');
    register_setting('monolith-social-group', 'monolith_googleplus');
    register_setting('monolith-social-group', 'monolith_youtube');
    register_setting('monolith-social-group', 'monolith_linkedin');
    register_setting('monolith-social-group', 'monolith_pinterest');
    register_setting('monolith-social-group', 'monolith_instagram');
});

/**
 * Produce admin menu markup for options
 */
add_action('admin_menu', function() {
    add_options_page('Social Media Options', 'Social Media Options', 'manage_options', 'monolith_social_media_settings', function() {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        ?>

        <div class="wrap">

            <h1>Social Media Options</h1>
            <hr />

            <form method="post" action="options.php">

                <?php @settings_fields('monolith-social-group'); ?>
                <?php @do_settings_sections('monolith-social-group'); ?>

                <h3>Social Media</h3>

                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><label for="monolith_facebook">Facebook</label></th>
                        <td>
                            <input type="text" name="monolith_facebook" id="monolith_facebook" value="<?= get_option('monolith_facebook') ? get_option('monolith_facebook') : '' ?>" size="50" placeholder="https://facebook.com/youraccountnamehere">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_twitter">Twitter</label></th>
                        <td>
                            <input type="text" name="monolith_twitter" id="monolith_twitter" value="<?= get_option('monolith_twitter') ? get_option('monolith_twitter') : '' ?>" size="50" placeholder="https://www.twitter.com/youraccountnamehere">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_googleplus">Google+</label></th>
                        <td>
                            <input type="text" name="monolith_googleplus" id="monolith_googleplus" value="<?= get_option('monolith_googleplus') ? get_option('monolith_googleplus') : '' ?>" size="50" placeholder="https://plus.google.com/+youraccountnamehere">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_youtube">Youtube</label></th>
                        <td>
                            <input type="text" name="monolith_youtube" id="monolith_youtube" value="<?= get_option('monolith_youtube') ? get_option('monolith_youtube') : '' ?>" size="50" placeholder="http://www.youtube.com/user/youraccountnamehere">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_linkedin">LinkedIn</label></th>
                        <td>
                            <input type="text" name="monolith_linkedin" id="monolith_linkedin" value="<?= get_option('monolith_linkedin') ? get_option('monolith_linkedin') : '' ?>" size="50" placeholder="http://www.linkedin.com/company/youraccountnamehere">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_pinterest">Pinterest</label></th>
                        <td>
                            <input type="text" name="monolith_pinterest" id="monolith_pinterest" value="<?= get_option('monolith_pinterest') ? get_option('monolith_pinterest') : '' ?>" size="50" placeholder="http://www.pinterest.com/youraccountnamehere">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_instagram">Instagram</label></th>
                        <td>
                            <input type="text" name="monolith_instagram" id="monolith_instagram" value="<?= get_option('monolith_instagram') ? get_option('monolith_instagram') : '' ?>" size="50" placeholder="http://instagram.com/youraccountnamehere">
                        </td>
                    </tr>
                </table>

                <?php @submit_button(); ?>

            </form>

        </div>

    <?php
    });
});

if ( ! function_exists( 'set_default_site_options' ) ) {
    /**
     * Add default site options if they don't exist in the database
     */
    function set_default_site_options()
    {

        // social media
        add_option('monolith_facebook', '');
        add_option('monolith_twitter', '');
        add_option('monolith_googleplus', '');
        add_option('monolith_youtube', '');
        add_option('monolith_linkedin', '');
        add_option('monolith_pinterest', '');
        add_option('monolith_instagram', '');
    }
}

add_action( 'after_setup_theme', 'set_default_site_options' );
