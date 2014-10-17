<?php
/** 
 * Monolith by BigSpring
 * Licensed under MIT Open Source
 */

get_header(); ?>

  <!-- start the temp content – please kille me, I am wrong -->
  <section class="row temp-content">    
    <div class="small-12 columns">
    
      <h1>Monolith 2.0</h1>
      <p>Remember when you were young, and you shone like the sun.</p>

        <?php $query_args = array(
            'posts_per_page' => 2,
            'post_type' => 'post'
        );

        $builder_args = array(
            //'classes' => 'list-unstyled'
        );
        ?>

        <?php get_builder_part('snippets', $query_args, $builder_args); ?>
        <?php get_builder_part(); ?>
      
    </div>  
  </section>
  <!-- end the temp content section -->

<?php get_footer(); ?>