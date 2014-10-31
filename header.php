<!DOCTYPE html>
<!--[if IE 9]><html class="lt-ie10" lang="en" > <![endif]-->
<html class="no-js" lang="en" >

    <head>
        <meta charset="utf-8">
        <!-- If you delete this meta tag World War Z will become a reality -->
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title><?php wp_title(); ?></title>

        <link rel="stylesheet" href="<?= get_assets_dir('css', 'base') ?>">
        <!-- HTML5 & responsive support for IE browsers... -->
        <!--[if lt IE 9]>
        <link href="<?= get_assets_dir('css', 'ie') ?>" rel="stylesheet" type="text/css">
        <script src="<?= get_assets_dir('js', 'ie') ?>"></script>
        <![endif]-->

    </head>

    <body>

        <?php get_template_part('layouts/organisms/nav-topbar'); // load the navigation ?>

        <!-- start main -->
        <main class="block-main" role="main">