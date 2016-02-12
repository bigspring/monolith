<?php
/**
 * Monolith by BigSpring
 * @license MIT http://opensource.org/licenses/MIT
 */

/**
 * Init settings
 */
add_action('admin_init', function() {

    // blog
    register_setting('monolith-blog-group', 'monolith_blog_page_title');
    register_setting('monolith-blog-group', 'monolith_blog_page_introtext');


});

/**
 * Produce admin menu markup for options
 */
add_action('admin_menu', function() {
    add_options_page('Blog Settings', 'Blog Settings', 'manage_options', 'monolith_blog_settings', function() {
        if (!current_user_can('manage_options')) {
            wp_die(__('You do not have sufficient permissions to access this page.'));
        }


        ?>

        <div class="wrap">

            <h1><?php _e( 'Blog Settings', 'monolith' ); ?></h1>
            <hr />

            <form method="post" action="options.php">

                <?php @settings_fields('monolith-blog-group'); ?>
                <?php @do_settings_sections('monolith-blog-group'); ?>

                <h3><?php _e( 'Blog', 'monolith' ); ?></h3>

                <table class="form-table">
                    <tr valign="top">
                        <th scope="row"><label for="monolith_blog_page_title"><?php _e( 'Blog Page Title (*)', 'monolith' ); ?></label></th>
                        <td>
                            <input type="text" name="monolith_blog_page_title" id="monolith_blog_page_title" value="<?= get_option('monolith_blog_page_title') ? get_option('monolith_blog_page_title') : '' ?>" size="50" placeholder="<?php _e( 'News', 'monolith' ); ?>" required>
                        </td>
                    </tr>
                    <tr valign="top">
                        <th scope="row"><label for="monolith_blog_page_introtext"><?php _e( 'Blog Page Introductory Text', 'monolith' ); ?></label></th>
                        <td>
                            <textarea name="monolith_blog_page_introtext" id="monolith_blog_page_introtext" cols="50" rows="3" placeholder="<?php _e( 'This is my news blog.', 'monolith' ); ?>"><?= get_option('monolith_blog_page_introtext') ? get_option('monolith_blog_page_introtext') : '' ?></textarea>
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


    }
}

add_action( 'after_setup_theme', 'set_default_site_options' );
