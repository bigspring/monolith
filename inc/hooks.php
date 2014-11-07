<?php
<<<<<<< HEAD
<<<<<<< HEAD
=======
=======
>>>>>>> FETCH_HEAD
/**
 * Collection of functions to handle all hooks required for Monolith
 * @license MIT http://opensource.org/licenses/MIT
 * @package monolith
 */

<<<<<<< HEAD
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
>>>>>>> 2.0

=======
>>>>>>> FETCH_HEAD
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


// Add a tinyMCE button
if ( ! function_exists( 'my_add_mce_button' ) ) {
    /**
     * Hooks your functions into the correct filters
     * @return array
     */

		// Hooks your functions into the correct filters
		function my_add_mce_button() {
			// check user permissions
			if ( !current_user_can( 'edit_posts' ) && !current_user_can( 'edit_pages' ) ) {
				return;
			}
			// check if WYSIWYG is enabled
			if ( 'true' == get_user_option( 'rich_editing' ) ) {
				add_filter( 'mce_external_plugins', 'my_add_tinymce_plugin' );
				add_filter( 'mce_buttons', 'my_register_mce_button' );
			}
		}
		add_action('admin_head', 'my_add_mce_button');
}

if ( ! function_exists( 'my_add_tinymce_plugin' ) ) {
    /**
     * Register new button in the editor
     * @return array
     */

		// Declare script for new button
		function my_add_tinymce_plugin( $plugin_array ) {
			$plugin_array['my_mce_button'] = get_template_directory_uri() .'/assets/js/mce-button.js';
			return $plugin_array;
		}
}

if ( ! function_exists( 'my_register_mce_button' ) ) {
    /**
     * Register new button in the editor
     * @return array
     */
		function my_register_mce_button( $buttons ) {
			array_push( $buttons, 'my_mce_button' );
			return $buttons;
		}

}
