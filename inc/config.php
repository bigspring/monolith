<?php
/**
 * Monolith by BigSpring
 * Licensed under MIT Open Source
 * @license MIT http://opensource.org/licenses/MIT
 * @package monolith
 */

/**
 * Environment
 */

define('ENVIRONMENT', 'development'); // development/production

/**
 * The Grid
 */

define('FULLWIDTH_SIZE', 'small-12 medium-12 large-12'); // the size of a full width area
define('MAIN_SIZE', 'small-12 medium-8'); // main content area sizes
define('SIDEBAR_SIZE', 'small-12 medium-4'); // sidebar sizes
define('BLOCK_GRID_SIZE', 'small-block-grid-2');

/**
 * Images
 */

define('DEFAULT_IMAGE', get_template_directory().'/assets/img/default.jpg'); // default image for posts
define('GALLERY_SIZE', 'col-md-3'); // the col size used in the gallery shortcode

/**
 * Featured image sizes
 */

set_post_thumbnail_size( 640, 360, true);
add_image_size( 'square', 640, 640, true );
add_image_size( 'thumbnail', 320, 320, true );
add_image_size( 'medium', 640, 360, true );
add_image_size( 'large', 970, 546, true );

/**
 * Shortcodes
 */

define('CHILD_GRID_SIZE', 'col-md-4'); // the col size used in the child pages grid shortcode

/**
 * ACHTUNG!
 * Don't touch anything below, or things will break and then I will break your fingers!!
 */

require_once('monolith.php');
require_once('hooks.php');
require_once('filters.php');
require_once('template_tags.php');
require_once('shortcodes.php');
require_once('builder.php');
require_once('settings.php');
require_once('monolith-widgets.php');
