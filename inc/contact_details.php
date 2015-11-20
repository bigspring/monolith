<?php
/**
 * Monolith by BigSpring
 * @license MIT http://opensource.org/licenses/MIT
 */

/**
 * Init settings
 */
add_action('admin_init', function() {

    // contact
    register_setting('monolith-contact-group', 'monolith_address_1');
    register_setting('monolith-contact-group', 'monolith_address_2');
    register_setting('monolith-contact-group', 'monolith_address_3');
    register_setting('monolith-contact-group', 'monolith_city');
    register_setting('monolith-contact-group', 'monolith_county');
    register_setting('monolith-contact-group', 'monolith_postcode');
    register_setting('monolith-contact-group', 'monolith_country');
    register_setting('monolith-contact-group', 'monolith_phone');
    register_setting('monolith-contact-group', 'monolith_secondary_phone');
    register_setting('monolith-contact-group', 'monolith_email');

});

/**
 * Produce admin menu markup for options
 */
add_action('admin_menu', function() {
    add_options_page('Contact Details', 'Contact Details', 'manage_options', 'monolith_contact_details_settings', function() {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }

        $countries = array("Afghanistan", "Albania", "Algeria", "American Samoa", "Andorra", "Angola", "Anguilla", "Antarctica", "Antigua and Barbuda", "Argentina", "Armenia", "Aruba", "Australia", "Austria", "Azerbaijan", "Bahamas", "Bahrain", "Bangladesh", "Barbados", "Belarus", "Belgium", "Belize", "Benin", "Bermuda", "Bhutan", "Bolivia", "Bosnia and Herzegowina", "Botswana", "Bouvet Island", "Brazil", "British Indian Ocean Territory", "Brunei Darussalam", "Bulgaria", "Burkina Faso", "Burundi", "Cambodia", "Cameroon", "Canada", "Cape Verde", "Cayman Islands", "Central African Republic", "Chad", "Chile", "China", "Christmas Island", "Cocos (Keeling) Islands", "Colombia", "Comoros", "Congo", "Congo, the Democratic Republic of the", "Cook Islands", "Costa Rica", "Cote d'Ivoire", "Croatia (Hrvatska)", "Cuba", "Cyprus", "Czech Republic", "Denmark", "Djibouti", "Dominica", "Dominican Republic", "East Timor", "Ecuador", "Egypt", "El Salvador", "Equatorial Guinea", "Eritrea", "Estonia", "Ethiopia", "Falkland Islands (Malvinas)", "Faroe Islands", "Fiji", "Finland", "France", "France Metropolitan", "French Guiana", "French Polynesia", "French Southern Territories", "Gabon", "Gambia", "Georgia", "Germany", "Ghana", "Gibraltar", "Greece", "Greenland", "Grenada", "Guadeloupe", "Guam", "Guatemala", "Guinea", "Guinea-Bissau", "Guyana", "Haiti", "Heard and Mc Donald Islands", "Holy See (Vatican City State)", "Honduras", "Hong Kong", "Hungary", "Iceland", "India", "Indonesia", "Iran (Islamic Republic of)", "Iraq", "Ireland", "Israel", "Italy", "Jamaica", "Japan", "Jordan", "Kazakhstan", "Kenya", "Kiribati", "Korea, Democratic People's Republic of", "Korea, Republic of", "Kuwait", "Kyrgyzstan", "Lao, People's Democratic Republic", "Latvia", "Lebanon", "Lesotho", "Liberia", "Libyan Arab Jamahiriya", "Liechtenstein", "Lithuania", "Luxembourg", "Macau", "Macedonia, The Former Yugoslav Republic of", "Madagascar", "Malawi", "Malaysia", "Maldives", "Mali", "Malta", "Marshall Islands", "Martinique", "Mauritania", "Mauritius", "Mayotte", "Mexico", "Micronesia, Federated States of", "Moldova, Republic of", "Monaco", "Mongolia", "Montserrat", "Morocco", "Mozambique", "Myanmar", "Namibia", "Nauru", "Nepal", "Netherlands", "Netherlands Antilles", "New Caledonia", "New Zealand", "Nicaragua", "Niger", "Nigeria", "Niue", "Norfolk Island", "Northern Mariana Islands", "Norway", "Oman", "Pakistan", "Palau", "Panama", "Papua New Guinea", "Paraguay", "Peru", "Philippines", "Pitcairn", "Poland", "Portugal", "Puerto Rico", "Qatar", "Reunion", "Romania", "Russian Federation", "Rwanda", "Saint Kitts and Nevis", "Saint Lucia", "Saint Vincent and the Grenadines", "Samoa", "San Marino", "Sao Tome and Principe", "Saudi Arabia", "Senegal", "Seychelles", "Sierra Leone", "Singapore", "Slovakia (Slovak Republic)", "Slovenia", "Solomon Islands", "Somalia", "South Africa", "South Georgia and the South Sandwich Islands", "Spain", "Sri Lanka", "St. Helena", "St. Pierre and Miquelon", "Sudan", "Suriname", "Svalbard and Jan Mayen Islands", "Swaziland", "Sweden", "Switzerland", "Syrian Arab Republic", "Taiwan, Province of China", "Tajikistan", "Tanzania, United Republic of", "Thailand", "Togo", "Tokelau", "Tonga", "Trinidad and Tobago", "Tunisia", "Turkey", "Turkmenistan", "Turks and Caicos Islands", "Tuvalu", "Uganda", "Ukraine", "United Arab Emirates", "United Kingdom", "United States", "United States Minor Outlying Islands", "Uruguay", "Uzbekistan", "Vanuatu", "Venezuela", "Vietnam", "Virgin Islands (British)", "Virgin Islands (U.S.)", "Wallis and Futuna Islands", "Western Sahara", "Yemen", "Yugoslavia", "Zambia", "Zimbabwe");

        ?>

        <div class="wrap">

            <h1>Contact Details</h1>
            <hr />

            <form method="post" action="options.php">

                <?php @settings_fields('monolith-contact-group'); ?>
                <?php @do_settings_sections('monolith-contact-group'); ?>


                <h3>Contact</h3>

                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><label for="monolith_address_1">Address 1</label></th>
                        <td>
                            <input type="text" name="monolith_address_1" id="monolith_address_1" value="<?= get_option('monolith_address_1') ? get_option('monolith_address_1') : '' ?>" size="50" placeholder="Strelley Hall">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_address_2">Address 2</label></th>
                        <td>
                            <input type="text" name="monolith_address_2" id="monolith_address_2" value="<?= get_option('monolith_address_2') ? get_option('monolith_address_2') : '' ?>" size="50" placeholder="Main Street">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_address_3">Address 3</label></th>
                        <td>
                            <input type="text" name="monolith_address_3" id="monolith_address_3" value="<?= get_option('monolith_address_3') ? get_option('monolith_address_3') : '' ?>" size="50" placeholder="Strelley">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_city">City</th>
                        <td>
                            <input type="text" name="monolith_city" id="monolith_city" value="<?= get_option('monolith_city') ? get_option('monolith_city') : '' ?>" size="50" placeholder="Nottingham">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_county">County</label></th>
                        <td>
                            <input type="text" name="monolith_county" id="monolith_county" value="<?= get_option('monolith_county') ? get_option('monolith_county') : '' ?>" size="50" placeholder="Nottinghamshire">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_postcode">Postcode</label></th>
                        <td>
                            <input type="text" name="monolith_postcode" id="monolith_postcode" value="<?= get_option('monolith_postcode') ? get_option('monolith_postcode') : '' ?>" size="15" placeholder="NG8 6PE">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_country">Country</label></th>
                        <td>
                            <select name="monolith_country" id="monolith_country">
                                <?php foreach ($countries as $country) : ?>
                                    <option value="<?= $country ?>"<?= get_option('monolith_country') ? (get_option('monolith_country') === $country ? ' selected' : '') : ($country === 'United Kingdom' ? ' selected' : '') ?>><?= $country ?></option>
                                <?php endforeach; ?>
                            </select>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_phone">Phone Number</label></th>
                        <td>
                            <input type="text" name="monolith_phone" id="monolith_phone" value="<?= get_option('monolith_phone') ? get_option('monolith_phone') : '' ?>" size="15" placeholder="(0115) 906 1321">
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_secondary_phone">Secondary Phone Number</label></th>
                        <td>
                            <input type="text" name="monolith_secondary_phone" id="monolith_secondary_phone" value="<?= get_option('monolith_secondary_phone') ? get_option('monolith_secondary_phone') : '' ?>" size="15" placeholder="(0) 123 906 1321">
                        </td>
                    </tr>
                    
                    <tr valign="top">
                        <th scope="row"><label for="monolith_email">Email</label></th>
                        <td>
                            <input type="text" name="monolith_email" id="monolith_email" value="<?= get_option('monolith_email') ? get_option('monolith_email') : '' ?>" size="35" placeholder="hello@website.com">
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
        // blog
        add_option('monolith_blog_page_title', 'Latest News');
        add_option('monolith_blog_page_introtext', '');

        // contact
        add_option('monolith_address_1', '');
        add_option('monolith_address_2', '');
        add_option('monolith_address_3', '');
        add_option('monolith_city', '');
        add_option('monolith_county', '');
        add_option('monolith_postcode', '');
        add_option('monolith_country', '');
        add_option('monolith_phone', '');
        add_option('monolith_secondary_phone', '');
        add_option('monolith_email', '');

    }
}

add_action( 'after_setup_theme', 'set_default_site_options' );
