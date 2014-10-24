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
        ?>

        <div class="wrap">

            <h1>Monolith Settings</h1>

            <form method="post" action="options.php">

                <?php @settings_fields('monolith-group'); ?>
                <?php @do_settings_sections('monolith-group'); ?>

                <h3>Monolith</h3>

                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><label for="monolith_environment">Switch Environment</th>
                        <td>
                            <select name="monolith_environment" id="monolith_environment">
                                <option<?= 'Development' === get_option('monolith_environment') ? ' selected' : '' ?>>Development</option>
                                <option<?= 'Production' === get_option('monolith_environment') ? ' selected' : '' ?>>Production</option>
                            </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_default_image">Default Image</th>
                        <td>
                            <input type="text" name="monolith_default_image" value="<?= get_option('monolith_default_image') ? get_option('monolith_default_image') : '' ?>" size="50">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_default_column">Default Columns</th>
                        <td>
                            <input type="text" name="monolith_default_column" value="<?= get_option('monolith_default_column') ? get_option('monolith_default_column') : '' ?>" size="10">
                        </td>
                    </tr>
                </table>

                <h3>Content</h3>

                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><label for="monolith_blog_page_title">Blog Page Title</th>
                        <td>
                            <input type="text" name="monolith_blog_page_title" id="monolith_blog_page_title" value="<?= get_option('monolith_blog_page_title') ? get_option('monolith_blog_page_title') : '' ?>" size="50">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_blog_page_introtext">Blog Page Infotext</th>
                        <td>
                            <textarea name="monolith_blog_page_introtext" id="monolith_blog_page_introtext" cols="50" rows="3"><?= get_option('monolith_blog_page_introtext') ? get_option('monolith_blog_page_introtext') : '' ?></textarea>
                        </td>
                    </tr>
                </table>


                <h3>Contact</h3>

                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><label for="monolith_address_1">Address 1</th>
                        <td>
                            <input type="text" name="monolith_address_1" id="monolith_address_1" value="<?= get_option('monolith_address_1') ? get_option('monolith_address_1') : '' ?>" size="50">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_address_2">Address 2</th>
                        <td>
                            <input type="text" name="monolith_address_2" id="monolith_address_2" value="<?= get_option('monolith_address_2') ? get_option('monolith_address_2') : '' ?>" size="50">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_address_3">Address 3</th>
                        <td>
                            <input type="text" name="monolith_address_3" id="monolith_address_3" value="<?= get_option('monolith_address_3') ? get_option('monolith_address_3') : '' ?>" size="50">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_city">City</th>
                        <td>
                            <input type="text" name="monolith_city" id="monolith_city" value="<?= get_option('monolith_city') ? get_option('monolith_city') : '' ?>" size="50">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_county">County</th>
                        <td>
                            <input type="text" name="monolith_county" id="monolith_county" value="<?= get_option('monolith_county') ? get_option('monolith_county') : '' ?>" size="50">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_postcode">Postcode</th>
                        <td>
                            <input type="text" name="monolith_postcode" id="monolith_postcode" value="<?= get_option('monolith_postcode') ? get_option('monolith_postcode') : '' ?>" size="15">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_country">Country</th>
                        <td>
                            <input type="text" name="monolith_country" id="monolith_country" value="<?= get_option('monolith_country') ? get_option('monolith_country') : '' ?>" size="50">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_phone">Phone</th>
                        <td>
                            <input type="text" name="monolith_phone" id="monolith_phone" value="<?= get_option('monolith_phone') ? get_option('monolith_phone') : '' ?>" size="15">
                        </td>
                    </tr>
                </table>

                <h3>Social Media</h3>

                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><label for="monolith_facebook">Facebook</th>
                        <td>
                            <input type="text" name="monolith_facebook" id="monolith_facebook" value="<?= get_option('monolith_facebook') ? get_option('monolith_facebook') : '' ?>" size="50">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_twitter">Twitter</th>
                        <td>
                            <input type="text" name="monolith_twitter" id="monolith_twitter" value="<?= get_option('monolith_twitter') ? get_option('monolith_twitter') : '' ?>" size="50">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_googleplus">Google+</th>
                        <td>
                            <input type="text" name="monolith_googleplus" id="monolith_googleplus" value="<?= get_option('monolith_googleplus') ? get_option('monolith_googleplus') : '' ?>" size="50">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_youtube">Youtube</th>
                        <td>
                            <input type="text" name="monolith_youtube" id="monolith_youtube" value="<?= get_option('monolith_youtube') ? get_option('monolith_youtube') : '' ?>" size="50">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_linkedin">LinkedIn</th>
                        <td>
                            <input type="text" name="monolith_linkedin" id="monolith_linkedin" value="<?= get_option('monolith_linkedin') ? get_option('monolith_linkedin') : '' ?>" size="50">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_pinterest">Pinterest</th>
                        <td>
                            <input type="text" name="monolith_pinterest" id="monolith_pinterest" value="<?= get_option('monolith_pinterest') ? get_option('monolith_pinterest') : '' ?>" size="50">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_instagram">Instagram</th>
                        <td>
                            <input type="text" name="monolith_instagram" id="monolith_instagram" value="<?= get_option('monolith_instagram') ? get_option('monolith_instagram') : '' ?>" size="50">
                        </td>
                    </tr>
                </table>

                <?php @submit_button(); ?>

            </form>

        </div>

    <?php
    });
});
