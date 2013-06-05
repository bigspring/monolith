<?php

// define the size of the left, right and full span sizes
define('SIDEBAR_SIZE', 				'col col-12 col-lg-4');
define('MAIN_SIZE',        			'col col-12 col-lg-8');
define('FULLWIDTH_SIZE',        	'col col-12');
define('CONTAINER_CLASSES',         'container');
define('ROW_CLASSES',         		'row');

// gallery shortcode options
define('GALLERY_SPAN_SIZE',			'4'); // this is the size of the span in the gallery shortcode
define('GALLERY_IMAGE_CLASSES',		''); // these classes are added to the image tag in the gallery

// set this to true to enable responsive
define('BOOTSTRAP_RESPONSIVE', 		true);

// set this to true to enable the Opengraph header
define('OPENGRAPH_HEAD',			false);
define('FACEBOOOK_ADMIN_ID',		'');
// the URI to the main logo for the site with a prevailing slash (eg. /wp-content/themes/img/logo.png) 
define('SITE_LOGO', '/');

define('GOOGLE_ANALYTICS_ID',       false);

// whether to load the site.js file
define('CUSTOM_JS',					true);

/**
 * Don't touch anything below, or thingds will break and then I will break your fingers
 * Don't touch anything below, or things will break and then I will break your fingers
 */
require_once('monolith.php');
require_once('hooks.php');
require_once('filters.php');
require_once('functions.php');
require_once('shortcodes.php');
require_once('monolith_widgets.php');