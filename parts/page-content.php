<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>	
	
	<?php if ($post->post_excerpt != '') { // show the excerpt if it exists ?>
	<section class="page-excerpt lead">
		<?php the_excerpt(); ?>
	</section>
	<? } ?>
	
	<section class="page-content">
	<?php the_content(); ?>					
	</section>
<?php endwhile; ?>