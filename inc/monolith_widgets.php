<?php
/**
 * Declares the required sidebars dependent on whether they're enabled in the config
 */
// Right Sidebar
if(ENABLE_RIGHT_SIDEBAR) {
	register_sidebar(array(
			'name' => __( 'Right Sidebar' ),
			'id' => 'sidebar-right',
			'description' => __( 'Right Sidebar Right widget area.' ),
			'before_widget' => '<section id="%s" class="widget">',
			'after_widget' => '</section>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
	));
}

// Left Sidebar
if(ENABLE_LEFT_SIDEBAR) {
	register_sidebar(array(
			'name' => __( 'Left Sidebar' ),
			'id' => 'sidebar-left',
			'description' => __( 'Left Sidebar Right widget area.' ),
			'before_widget' => '<section id="%s" class="widget">',
			'after_widget' => '</section>',
			'before_title' => '<h3>',
			'after_title' => '</h3>'
	));
}
/**
 * ADD NEW SIDEBARS BELOW HERE
 */
?>