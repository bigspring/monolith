<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<article>		
		
		<header class="page-header">
			<h1 class="page-title"><?php the_title(); ?></h1>
		</header>
		
		<?php if ($post->post_excerpt != '') { // show the excerpt if it exists ?>
		<section class="page-intro lead">
			<?php the_excerpt(); ?>
		</section>
		<? } ?>
		
		<section class="page-content">
			<?php the_content(); ?>
		</section>
					
	</article>
<?php endwhile; ?>