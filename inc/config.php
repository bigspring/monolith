<?php

// Scaffolding
// --------------------------------------------

	define('SIDEBAR_SIZE', 				'col-md-4'); // sidebar sizes
	define('MAIN_SIZE',        			'col-md-8'); // main content area sizes
	define('FULLWIDTH_SIZE',        	'col-md-12'); // full width page sizes
	define('CONTAINER_CLASSES',         'container'); // classes used in containers
	define('ROW_CLASSES',         		'row'); // the classes used in rows

// Galleries
// --------------------------------------------

	define('GALLERY_SIZE',			'col-md-3'); // the col size used in the gallery shortcode

// Shortcodes
// --------------------------------------------

	define('CHILD_GRID_SIZE',		'col-md-4'); // the col size used in the child pages grid shortcode

// Analytics
// --------------------------------------------

	define('GOOGLE_ANALYTICS_ID',       false);


// ** ACHTUNG! **
// Don't touch anything below, or things will break and then I will break your fingers!!
// -------------------------------------------------------------------------------------

	require_once('monolith.php');
	require_once('hooks.php');
	require_once('filters.php');
	require_once('functions.php');
	require_once('shortcodes.php');
	require_once('monolith_widgets.php');