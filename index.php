<?php
/**
 * Main index file, which does all the heavy lifting.
 * @license MIT http://opensource.org/licenses/MIT
 * @package monolith
 */
get_header(); ?>

<?php      

  if (is_page()) :
    ?>

      <ul class="tick">
          <li>Test</li>
          <li>Test</li>
          <li>Test</li>
          <li>Test</li>
          <li>Test</li>
      </ul>

    <?php

  elseif ( is_home() || is_archive() ) :
   
    build('snippets'); // if it's the main loop, load snippets
    
  else :

    build('content');  // otherwise, load content by default

  endif;

?>

<?php get_footer();