<?php
/**
 * Defines all core sidebars in the theme
 * @license MIT http://opensource.org/licenses/MIT
 * @package monolith
 */

// Right Sidebar
register_sidebar( array(
	'name'          => __( 'Sidebar' ),
	'id'            => 'sidebar',
	'description'   => __( 'The sidebar area' ),
	'before_widget' => '<section id="widget-%s" class="widget widget-%s sidebar-widget">',
	'after_widget'  => '</section>',
	'before_title'  => '<h3 class="widget-title">',
	'after_title'   => '</h3>'
) );
