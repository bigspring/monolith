<?php
/**
 * Collection of functions and classes for all core Monolith functionality such as menus, the walker and basic theme setup actions
 * @license MIT http://opensource.org/licenses/MIT
 * @package monolith
 */

add_action( 'after_setup_theme', 'monolith_setup' ); // sets up all standard
add_action( 'wp_enqueue_scripts', 'monolith_script_enqueuer');

function monolith_script_enqueuer() {

	wp_enqueue_script( 'jquery' ); // enable jQuery
	wp_enqueue_style('base', get_asset_uri('css', 'base', true), null, filemtime(get_asset_directory('css', 'base', true)));
	if (ENVIRONMENT === 'development') {
		wp_enqueue_style('base', get_asset_uri('css', 'custom'), null, filemtime(get_asset_directory('css', 'custom')));
	}
	wp_enqueue_script('base', get_asset_uri('js', 'base'), array('jquery'), filemtime(get_asset_directory('js', 'base')), true);
}

function monolith_setup() {

	add_action( 'init', 'register_menu' ); // registers the default menu
	add_theme_support( 'post-thumbnails' ); // adds post thumbnail support
	add_post_type_support( 'page', 'excerpt' ); // add support for excerpts to pages
	remove_action( 'wp_head', 'wp_generator' ); // remove the generator from the head

	/**
	 * Registers the default menu
	 */
	function register_menu() {
		register_nav_menu( 'primary-navigation', 'Primary Navigation' );

		// create a custom footer menu
		register_nav_menu( 'footer', 'Footer Menu' );

	}

	/**
	 * Class Monolith_Nav_Walker
	 * Custom walker taken from FoundationPress theme
	 * @link https://raw.githubusercontent.com/olefredrik/FoundationPress/
	 */
	class Monolith_Nav_Walker extends Walker_Nav_Menu {

		function display_element( $element, &$children_elements, $max_depth, $depth = 0, $args, &$output ) {
			$element->has_children = ! empty( $children_elements[ $element->ID ] );
			$element->classes[]    = ( $element->current || $element->current_item_ancestor ) ? 'active' : '';
			$element->classes[]    = ( $element->has_children && $max_depth !== 1 ) ? 'has-dropdown' : '';

			parent::display_element( $element, $children_elements, $max_depth, $depth, $args, $output );
		}

		function start_el( &$output, $object, $depth = 0, $args = array(), $current_object_id = 0 ) {
			$item_html = '';
			parent::start_el( $item_html, $object, $depth, $args );

			$output .= ( $depth === 0 ) ? '<li class="divider"></li>' : '';

			$classes = empty( $object->classes ) ? array() : (array) $object->classes;

			if ( in_array( 'label', $classes ) ) {
				$output .= '<li class="divider"></li>';
				$item_html = preg_replace( '/<a[^>]*>(.*)<\/a>/iU', '<label>$1</label>', $item_html );
			}

			if ( in_array( 'divider', $classes ) ) {
				$item_html = preg_replace( '/<a[^>]*>( .* )<\/a>/iU', '', $item_html );
			}

			$output .= $item_html;
		}

		function start_lvl( &$output, $depth = 0, $args = array() ) {
			$output .= "\n<ul class=\"sub-menu dropdown\">\n";
		}

	}
}
