<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>	

<article itemscope itemtype="http://schema.org/Article" <?php post_class(); ?>>		
	
	<?php if ($post->post_excerpt != '') { // show the excerpt if it exists ?>
	<section class="page-excerpt lead" itemprop="description">
		<?php the_excerpt(); ?>
	</section>
	<? } ?>
	
	<main class="page-content" itemprop="text" role="main">
	<?php the_content(); ?>					
	</main>
</article>

<?php endwhile; ?>