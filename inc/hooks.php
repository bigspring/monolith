<?php
/**
 * Collection of functions to handle all hooks required for Monolith
 * @license MIT http://opensource.org/licenses/MIT
 * @package monolith
 */

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

if ( ! function_exists( 'display_environment_on_admin_bar' ) ) {
    /**
     * Display notification in Wordpress bar when in development mode
     */
    function display_environment_on_admin_bar($wp_admin_bar)
    {
        $args = array(
            'id' => 'monolith_env',
            'title' => '<span style="color: #FFFFFF; background-color: #FF0000; padding: 2px 5px; border-radius: 3px; font-size: 0.9em;">DEV MODE</span>',
        );
        $wp_admin_bar->add_node($args);
    }
}

if (ENVIRONMENT === 'development') {
    add_action('admin_bar_menu', 'display_environment_on_admin_bar', 1);
}

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
