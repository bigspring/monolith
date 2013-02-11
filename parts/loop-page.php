<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<article>
		<header class="page-header">
			<h1><?php the_title(); ?></h1>
		</header>
		
		<?php if ($post->post_excerpt != '') { // show the excerpt if it exists ?>
			<div class="lead">
				<?php the_excerpt(); ?>
			</div>
		<? } ?>
		
		<?php the_content(); ?>					
	</article>
<?php endwhile; ?>