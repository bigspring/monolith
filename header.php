<!DOCTYPE html>
<!--[if IE 7]>
<html class="ie ie7" <?php language_attributes(); ?>>
<![endif]-->
<!--[if IE 8]>
<html class="ie ie8" <?php language_attributes(); ?>>
<![endif]-->
<!--[if !(IE 7) | !(IE 8)  ]><!-->
<html <?php language_attributes(); ?>>
<!--<![endif]-->
	<head>	    
	    <meta charset="<?php bloginfo( 'charset' ); ?>" />
	    <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1">
	    <title><?php wp_title(); ?></title>
	    <meta name="viewport" content="width=device-width, initial-scale=1.0">
	
	    <link rel="pingback" href="<?php bloginfo( 'pingback_url' ); ?>" />
	    
	    <!-- Fav and touch icons -->
	    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/ico/apple-touch-icon-144-precomposed.png">
	    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/ico/apple-touch-icon-114-precomposed.png">
	    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/ico/apple-touch-icon-72-precomposed.png">
	    <link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/ico/apple-touch-icon-57-precomposed.png">
	    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/ico/favicon.png">
	    
	    <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/base.min.css" rel="stylesheet" type="text/css">
	    <?php wp_head(); ?>
	
	    <!-- HTML5 & responsive support for IE browsers... -->
	    <!--[if lt IE 9]>
	   	  <link href="<?php echo get_stylesheet_directory_uri(); ?>/css/ie.css" rel="stylesheet" type="text/css">        
	      <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/ie.min.js"></script>
	    <![endif]-->
	
	</head>
	
	<body <?php body_class(); ?>>
	<? get_template_part('parts/nav') ?>