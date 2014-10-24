<?php

 // Monolith by BigSpring
 // Licensed under MIT Open Source
 // Description: Main index file, which does all the heavy lifting.

get_header(); ?>

  <!-- start the title row -->
  <?php get_template_part('layouts/molecules/title'); ?>
  <!-- end the title row -->

  <!-- start the main content row -->
  <div class="row">    

    <div class="large-8 columns" role="main">
      <?php while ( have_posts() ) : the_post(); ?><?php the_content(); ?><?php endwhile; ?>
      <?php 
      
        if( is_single() || is_page() ) :       
            build('content'); // load the content part on posts & pages
          build('content'); // load the content part on posts & pages
        else :
        
          build('snippets'); // otherwise, load the snippets builder          
        
        endif;
          
      ?>
      
    </div>
    
    <!-- start the sidebar -->
    <div id="sidebar" class="large-4 columns sidebar" role="complementary">
      
      <?php get_template_part('layouts/organisms/sidebar'); ?>
    
    </div>
    <!-- end the sidebar -->
    
  </div><!-- /.row -->
  <!-- end the main content row -->

<?php get_footer(); ?>