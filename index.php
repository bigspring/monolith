<?php
/**
 * Main index file, which does all the heavy lifting.
 * @license MIT http://opensource.org/licenses/MIT
 * @package monolith
 */
get_header(); ?>

  <!-- start the title row -->
  <?php get_template_part('layouts/molecules/title'); ?>
  <!-- end the title row -->

  <!-- start the main content row -->
  <div class="row">    
    
    <?php // if we're using the fullwdith template, apply the relevant class ?>
    <div class="columns <?= is_page_template('page-fullwidth.php') ? FULLWIDTH_SIZE : MAIN_SIZE; ?>" role="main">
      <?php      
        if( is_single() || is_page() ) :       
            build('content'); // load the content part on posts & pages
        else :        
          build('snippets'); // otherwise, load the snippets builder                  
        endif;
      ?>      
    </div>
    
    <!-- start the sidebar -->
    <?php if( !is_page_template('page-fullwidth.php') ) : // do not load sidebar if using fullwidth template ?>
    <div id="sidebar" class="columns <?= SIDEBAR_SIZE; ?> sidebar" role="complementary">      
      <?php get_template_part('layouts/organisms/sidebar'); ?> 
    </div>
    <?php endif; ?>
    <!-- end the sidebar -->
    
  </div><!-- /.row -->
  <!-- end the main content row -->

<?php get_footer();