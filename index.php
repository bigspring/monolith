<?php
/** 
 * Monolith by BigSpring
 * Licensed under MIT Open Source
 */

get_header(); ?>

  <!-- start the title row -->
  <div class="row">
    <div class="small-12 columns">
      <?php get_template_part('layouts/organisms/title'); ?>
    </div>
  </div>
  <!-- end the title row -->

  <!-- start the main content row -->
  <div class="row">    

    <div class="large-8 columns" role="main">
      
      <!-- start the main content loops -->
      <?php if ( have_posts() ) : while ( have_posts() ) : the_post(); ?>      
      
        <?php get_template_part('layouts/molecules/snippet'); // load the snippet part ?>
        
      <?php endwhile; ?>
      
      <?php else : ?>
        <?php get_template_part('layouts/organisms/content-none') // load the content-none part ?>    
      <?php endif; ?>
      <!-- end the main content loops -->
      
    </div>
    
    <!-- start the sidebar -->
    <div id="sidebar" class="sidebar large-4 columns" role="complementary">
      <?php get_template_part('layouts/organisms/sidebar'); ?>
    </div>
    <!-- end the sidebar -->
    
  </div><!-- /.row -->
  <!-- end the main content row -->

<?php get_footer(); ?>