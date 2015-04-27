<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >

    <head>
        <meta charset="utf-8">
        <!-- If you delete this meta tag World War Z will become a reality -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php wp_title(); ?></title>

		    <!-- Fav and touch icons -->
		    <link rel="apple-touch-icon-precomposed" sizes="144x144" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/apple-touch-icon-144-precomposed.png">
		    <link rel="apple-touch-icon-precomposed" sizes="114x114" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/apple-touch-icon-114-precomposed.png">
		    <link rel="apple-touch-icon-precomposed" sizes="72x72" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/apple-touch-icon-72-precomposed.png">
		    <link rel="apple-touch-icon-precomposed" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/apple-touch-icon-57-precomposed.png">
		    <link rel="shortcut icon" href="<?php echo get_stylesheet_directory_uri(); ?>/assets/icons/favicon.ico">


        <?php wp_head(); ?>

        <link rel="stylesheet" href="<?= get_asset_uri('css', 'base') ?>">
        <!-- HTML5 & responsive support for IE browsers... -->
        <!--[if lt IE 10]>
        <link href="<?= get_asset_uri('css', 'ie') ?>" rel="stylesheet" type="text/css">
        <script src="<?= get_asset_uri('js', 'ie') ?>"></script>
        <![endif]-->

				<!--[if lt IE 9]>
			  <script src="//cdnjs.cloudflare.com/ajax/libs/html5shiv/3.6.2/html5shiv.js"></script>
			  <script src="//s3.amazonaws.com/nwapi/nwmatcher/nwmatcher-1.2.5-min.js"></script>
			  <script src="//html5base.googlecode.com/svn-history/r38/trunk/js/selectivizr-1.0.3b.js"></script>
			  <script src="//cdnjs.cloudflare.com/ajax/libs/respond.js/1.1.0/respond.min.js"></script>
				<![endif]-->

    </head>

    <body <?php body_class(); ?>>

        <?php get_template_part('layouts/organisms/nav-topbar'); // load the navigation ?>
        
        <!-- the main block -->
        <main class="block-main" role="main">

          <!-- the breadcrumbs block -->
          <?php get_template_part('layouts/molecules/breadcrumbs'); ?>

          <!-- page title & hero unit -->          
          <?php 
                        
            if ( is_front_page() ) : // if it's a static homepage, load the hero unit

              get_template_part('layouts/organisms/hero-unit');
            
            else : // otherwise, load the standard page header

              get_template_part('layouts/organisms/page-header');

            endif;
            
          ?>
                  
          <!-- start the main content row -->
          <div class="row">
            
            <?php // if we're using the fullwdith template, apply the relevant class ?>
            <div class="columns <?= is_page_template('page-fullwidth.php') ? FULLWIDTH_SIZE : MAIN_SIZE; ?>" role="main">