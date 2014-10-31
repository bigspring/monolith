<?php
/**
 * Monolith by BigSpring
 * Licensed under MIT Open Source
 *
 * @package monolith
 */

/**
 * Environment
 */

define('ENVIRONMENT', 'development'); // development/production

/**
 * Scaffolding
 */

define('FULLWIDTH_SIZE', 'small-12 medium-12 large-12'); // the size of a full width area
define('MAIN_SIZE', 'small-12 medium-8'); // main content area sizes
define('SIDEBAR_SIZE', 'small-12 medium-4'); // sidebar sizes
define('BLOCK_GRID_SIZE', 'small-block-grid-2 medium-block-grid-3 large-block-grid-4');

/**
 * Images
 */

define('DEFAULT_IMAGE', get_template_directory().'/assets/img/default.jpg'); // default image for posts
define('GALLERY_SIZE', 'col-md-3'); // the col size used in the gallery shortcode

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
