<?php
// enable the sidebars by setting to true or false
define('ENABLE_LEFT_SIDEBAR',		false);
define('ENABLE_RIGHT_SIDEBAR',		true);

// define the size of the left, right and full span sizes
define('SIDEBAR_LEFT_SIZE', 		'3');
define('SIDEBAR_RIGHT_SIZE', 		'3');
define('FULLWIDTH_SIZE',        	'12');
define('CONTAINER_CLASSES',         'container');
define('ROW_CLASSES',         		'row');

// set this to true to enable responsive
define('BOOTSTRAP_RESPONSIVE', 		false);

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
 */
require_once('monolith.php');
require_once('hooks.php');
require_once('filters.php');
require_once('functions.php');
require_once('shortcodes.php');
require_once('monolith_widgets.php');