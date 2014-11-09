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

/**
 * Enable excerpt for each new user at registration
 */
add_action('user_register', function ($user_id = null) {

    // These are the metakeys we will need to update
    $meta_key['order'] = 'meta-box-order_post';
    $meta_key['hidden'] = 'metaboxhidden_post';

    // So this can be used without hooking into user_register
    if ( ! $user_id)
        $user_id = get_current_user_id();

    // Set the default order if it has not been set yet
    if ( ! get_user_option( $user_id, $meta_key['order'], true) ) {
        $meta_value = array(
            'side' => 'submitdiv,formatdiv,categorydiv,postimagediv',
            'normal' => 'postexcerpt,tagsdiv-post_tag,postcustom,commentstatusdiv,commentsdiv,trackbacksdiv,slugdiv,authordiv,revisionsdiv',
            'advanced' => '',
        );
        update_user_option( $user_id, $meta_key['order'], $meta_value, true );
    }

    // Set the default hiddens if it has not been set yet
    if ( ! get_user_option( $user_id, $meta_key['hidden'], true) ) {
        $meta_value = array('postcustom','trackbacksdiv','commentstatusdiv','commentsdiv','slugdiv','authordiv','revisionsdiv');
        update_user_option( $user_id, $meta_key['hidden'], $meta_value, true );
    }
});

/**
 * Remove default excerpt box
 */
add_action('admin_menu', function () {
    remove_meta_box('postexcerpt', 'post', 'normal');
}, 999);

/**
 *
 */
add_action('edit_form_after_title', function ($post) {
    ?>
    <br>
    <div id="postbox-container-69" class="postbox-container">
        <div id="normal-sortables" class="meta-box-sortables">
            <div id="postexcerpt" class="postbox">
                <div class="handlediv" title="Click to toggle"><br /></div>
                <h3 class='hndle'><span>Excerpt</span></h3>
                <div class="inside">
                    <label class="screen-reader-text" for="excerpt">Excerpt</label>
                    <textarea rows="1" cols="40" name="excerpt" id="excerpt"><?= $post->post_excerpt ?></textarea>
                    <p>A brief summary of the full post content.</p>
                </div>
        </div>
    </div>
    <?php
});
