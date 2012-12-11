<?php
require_once('inc/config.php');

// define custom image sizes below
set_post_thumbnail_size( 200, 150, true);
//add_image_size( $name, $width, $height, $crop );

register_nav_menu( 'secondary', 'Secondary Navigation' );//get that permission for the second nav menu that we all want in our lives.

function the_post_thumbnail_caption() {
  global $post;

  $thumbnail_id    = get_post_thumbnail_id($post->ID);
  $thumbnail_image = get_posts(array('p' => $thumbnail_id, 'post_type' => 'attachment'));

  if ($thumbnail_image && isset($thumbnail_image[0])) {
    echo '<span>'.$thumbnail_image[0]->post_excerpt.'</span>';
  }
}