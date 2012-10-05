<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
	<article>
		<header>
			<div class="page-header">
				<h1><?php the_title(); ?></h1>
			</div>
		</header>
		<?php the_content(); ?>					
		<footer>
			<?php // comments_template( '', true ); ?>
		</footer>
	</article>
<?php endwhile; ?>