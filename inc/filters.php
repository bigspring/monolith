<?php
/**
 * Collection of functions to handle all filters required for Monolith
 * @license MIT http://opensource.org/licenses/MIT
 * @package monolith
 */

if ( ! function_exists( 'monolith_remove_empty_paragraph_in_shortcodes' ) ) {
	/**
	 * Append page slugs to the body class
	 *
	 * @param    array
	 *
	 * @return    array
	 * @author    Jon Martin
	 */
	function add_slug_to_body_class( $classes ) {
		global $post;

		if ( is_home() ) {
			$key = array_search( 'blog', $classes );
			if ( $key > - 1 ) {
				unset( $classes[ $key ] );
			};
		} elseif ( is_page() ) {
			$classes[] = sanitize_html_class( $post->post_name );
		} elseif ( is_singular() ) {
			$classes[] = sanitize_html_class( $post->post_name );
		};

		return $classes;
	}

	add_filter( 'body_class', 'add_slug_to_body_class' );
}


/**
 * Remove empty P tags from content
 * @license MIT http://opensource.org/licenses/MIT
 * @package monolith
 */

add_filter('the_content', 'remove_empty_tags_recursive', 20, 1);
function remove_empty_tags_recursive ($str, $repto = NULL) {
	 $str = force_balance_tags($str);
	 //** Return if string not given or empty.
	 if (!is_string ($str)
	 	|| trim ($str) == '')
	 return $str;
	
	//** Recursive empty HTML tags.
	return preg_replace (
	
	      //** Pattern written by Junaid Atari.
	      '/<([^<\/>]*)>([\s]*?|(?R))<\/\1>/imsU',
	
	     //** Replace with nothing if string empty.
	     !is_string ($repto) ? '' : $repto,
	
	    //** Source string
	   $str
	);
} 
