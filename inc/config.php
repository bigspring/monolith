<?php
/**
 * Monolith by BigSpring
 * Licensed under MIT Open Source
 * @license MIT http://opensource.org/licenses/MIT
 * @package monolith
 */

/**
 * The Grid
 */

define( 'FULLWIDTH_SIZE', 'small-12 medium-12 large-12' ); // the size of a full width area
define( 'MAIN_SIZE', 'small-12 medium-8' ); // main content area sizes
define( 'SIDEBAR_SIZE', 'small-12 medium-4' ); // sidebar sizes
define( 'BLOCK_GRID_SIZE', 'small-block-grid-2' );

/**
 * Images
 */

define( 'DEFAULT_IMAGE', get_template_directory() . '/assets/img/default.jpg' ); // default image for posts
define( 'GALLERY_SIZE', 'col-md-3' ); // the col size used in the gallery shortcode

/**
 * Featured image sizes
 */

set_post_thumbnail_size( 640, 360, true );
add_image_size( 'square', 640, 640, true );
add_image_size( 'small-square', 320, 320, true );
add_image_size( 'small-landscape', 640, 360, true );
add_image_size( 'landscape', 970, 546, true );
add_image_size( 'portrait', 600, 840, true );

// Add new image sizes to attachment settings size dropdown
$img_config['imgSize']['newthumbnail'] = array('width'=>200,  'height'=>200);

function monolith_change_image_size_array($sizes) {
	global $img_config;
		
	$img_config['selectableImgSize'] = array(
	'square' 				=> __('Square','monolith'),
	'small-square' 			=> __('Small Square','monolith_framework'),
	'landscape'  			=> __('Landscape','monolith_framework'),
	'small-landscape'  		=> __('Small Landscape','monolith_framework'),
	'portrait'  		=> __('Portrait','monolith_framework'),
	);
	
	$sizes = array_merge($sizes, $img_config['selectableImgSize']);

	return $sizes; 	
}
add_filter( 'image_size_names_choose', 'monolith_change_image_size_array', 10, 1);


/**
 * Shortcodes
 */

define( 'CHILD_GRID_SIZE', 'col-md-4' ); // the col size used in the child pages grid shortcode


/**
 * Fullwidth function
 */

function fullwidth_conditions() {
	return
		is_page_template( 'page-fullwidth.php' ) ||
		is_front_page() ||
		is_404() ||
		is_search();
}


/**
 * ACHTUNG!
 * Don't touch anything below, or things will break and then I will break your fingers!!
 */

require_once( 'monolith.php' );
require_once( 'hooks.php' );
require_once( 'filters.php' );
require_once( 'template_tags.php' );
require_once( 'shortcodes.php' );
require_once( 'builder.php' );
require_once( 'contact_details.php' );
require_once( 'blog_settings.php' );
require_once( 'social_media.php' );
require_once( 'monolith-widgets.php' );
