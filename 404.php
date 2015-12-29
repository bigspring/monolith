<?php
/**
 * 404 Error page
 * @license MIT http://opensource.org/licenses/MIT
 * @package monolith
 */
get_header(); ?>

<div class="row">
  <div class="columns medium-8 medium-centered">

	  <div class="error-404">
	
	    <header class="text-center">
	      <h1><?php _e('Page not found (error 404)','monolith'); ?></h1>
	      <p class="lead"><?php _e('Sorry – the page you were looking for does not exist.','monolith'); ?></p>
	      <p><?php _e('Try going','monolith'); ?> <a href="<?php bloginfo('url'); ?>"><?php _e('back to the homepage,','monolith'); ?></a> <?php _e('or search the site using the form below:','monolith'); ?></p>
	
	      <?php get_template_part('layouts/molecules/searchform'); ?>
	
	    </header>
	  </div>
  
	</div>
</div>


<?php get_footer();
