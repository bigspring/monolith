<?php
/**
 * Collection of functions to handle all filters required for Monolith
 * @license MIT http://opensource.org/licenses/MIT
 * @package monolith
 */

/**
 * Append page slugs to the body class
 *
 * @param 	array
 * @return 	array
 * @author 	Jon Martin
 */
function add_slug_to_body_class( $classes ) {
	global $post;

	if( is_home() ) {
		$key = array_search( 'blog', $classes );
		if($key > -1) {
			unset( $classes[$key] );
		};
	} elseif( is_page() ) {
		$classes[] = sanitize_html_class( $post->post_name );
	} elseif(is_singular()) {
		$classes[] = sanitize_html_class( $post->post_name );
	};

	return $classes;
}
add_filter( 'body_class', 'add_slug_to_body_class' );