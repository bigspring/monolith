<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >

    <head>
        <meta charset="utf-8">
        <!-- If you delete this meta tag World War Z will become a reality -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php wp_title(); ?></title>

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
        
        <!-- start main -->
        <main class="block-main" role="main">
