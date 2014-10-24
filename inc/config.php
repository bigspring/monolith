<?php
/**
 * Monolith by BigSpring
 * Licensed under MIT Open Source
 */

// Scaffolding
// --------------------------------------------

	define('GRID_SIZE',             '12'); // overall grid size
    define('SIDEBAR_SIZE', 		    'col-md-4'); // sidebar sizes
	define('MAIN_SIZE',        	    'col-md-8'); // main content area sizes
	define('FULLWIDTH_SIZE',        'col-md-12'); // full width page sizes
	
// Galleries
// --------------------------------------------

	define('GALLERY_SIZE',		    'col-md-3'); // the col size used in the gallery shortcode

// Shortcodes
// --------------------------------------------

	define('CHILD_GRID_SIZE',	    'col-md-4'); // the col size used in the child pages grid shortcode

// Analytics
// --------------------------------------------

	define('GOOGLE_ANALYTICS_ID',   false);


// ** ACHTUNG! **
// Don't touch anything below, or things will break and then I will break your fingers!!
// -------------------------------------------------------------------------------------

	require_once('monolith.php');
    require_once('hooks.php');
	require_once('filters.php');
    require_once('template_tags.php');
	require_once('shortcodes.php');
    require_once('builder.php');
    require_once('settings.php');
    //require_once('functions.php');
