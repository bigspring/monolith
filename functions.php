<?php
require_once('inc/config.php');

// define custom image sizes below
set_post_thumbnail_size( 200, 150, true);
//add_image_size( $name, $width, $height, $crop );

//get that permission for the second nav menu that we all want in our lives.
register_nav_menu( 'secondary', 'Secondary Navigation' );

