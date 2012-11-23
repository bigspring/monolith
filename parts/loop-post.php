<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<article>	
	<header>
		<h2><?php the_title(); ?></h2>
		<?php get_template_part('parts/postmeta'); ?>
	</header>
		<?php the_content(); ?>			
	<footer>
	<?php if ( get_the_author_meta( 'description' ) ) : ?>
		<div class="well">
			<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
			<h3>About <?php echo get_the_author() ; ?></h3>
			<?php the_author_meta( 'description' ); ?>
		</div>
	<?php endif; ?>
	<?php comments_template( '', true ); ?>
	</footer>	
</article>
<?php endwhile; ?>
