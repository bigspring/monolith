<?php
/**
 * Collection of functions to handle all hooks required for Monolith
 * @license MIT http://opensource.org/licenses/MIT
 * @package monolith
 */

//code to render the dropdown list of shortcodes
if ( ! function_exists( 'add_shortcode_select_to_editor' ) ) {
    /**
     * Adds a select dropdown to the editor that allows quick access to shortcodes
     */
    function add_shortcode_select_to_editor(){
        echo '&nbsp;<select id="sc_select">
            <option disabled="disabled">Shortcodes</option>
            <option value="[intro][/intro]">[intro]</option>
            <option value="[button text=&#34;Button Text&#34; url=&#34;http://&#34; type=&#34;default&#34; size=&#34;&#34;]">[button]</option>
            <option value="[alert text=&#34;&#34; type=&#34;&#34; close=&#34;&#34;]">[alert]</option>
            <option value="[blockquote cite=&#34;&#34; float=&#34;&#34;][/blockquote]">[blockquote]</option>
            <option value="[columns][/columns]">[columns]</option>
            <option value="[childpages layout=&#34;list&#34;]">[childpages]</option>

        </select>';
    }
    add_action('media_buttons','add_shortcode_select_to_editor',11);
}

if ( ! function_exists( 'button_js' ) ) {
    /**
     * @TODO what the fuck does this do?
     * @return void
     */
    function button_js() {
        echo '<script type="text/javascript">
            jQuery(document).ready(function(){
                jQuery("#sc_select").change(function() {
                    send_to_editor(jQuery("#sc_select :selected").val());
                    return false;
                });
            });
        </script>';
    }
    add_action('admin_head', 'button_js');
}

if ( ! function_exists( 'login_css' ) ) {
    /**
     * Custom WordPress Login styling, use the login.css to style the WP login page with site logo etc...
     * @return void
     */
    function login_css() {
        wp_enqueue_style( 'login_css', get_template_directory_uri() . '/css/login.css' );
    }
    add_action('login_head', 'login_css');
}

if ( ! function_exists( 'wpb_imagelink_setup' ) ) {
    /**
     * Stop WP from automatically linking images to themselves
     * @return void
     */
    function wpb_imagelink_setup() {
        $image_set = get_option( 'image_default_link_type' );

        if ($image_set !== 'none') {
            update_option('image_default_link_type', 'none');
        }
    }
    add_action('admin_init', 'wpb_imagelink_setup', 10);
}	