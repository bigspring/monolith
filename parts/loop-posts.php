<? // multiple posts loop ?>

<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
<article <?php post_class(); ?>>	
	<header>
		<h2><a href="<?= get_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part('parts/meta/date-authorlink'); ?>
	</header>
		<?php the_excerpt(); ?>
		<?php get_template_part('parts/meta/readmore'); ?>&nbsp;<?php get_template_part('parts/meta/comments'); ?>		
</article>
<hr/>
<?php endwhile; ?>