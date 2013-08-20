<?php
/**
 * Declares the required sidebars dependent on whether they're enabled in the config
 */
// Right Sidebar
if(ENABLE_RIGHT_SIDEBAR) {
	register_sidebar(array(
			'name' => __( 'Sidebar' ),
			'id' => 'sidebar',
			'description' => __( 'Sidebar Widget Area.' ),
			'before_widget' => '<section id="widget-%s" class="widget widget-%s sidebar-widget">',
			'after_widget' => '</section>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
	));
}

/**
 * ADD NEW SIDEBARS BELOW HERE
 */

?>