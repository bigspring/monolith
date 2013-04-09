<? // markup for post snippet, used in loops and queries ?>
<article <?php post_class(); ?>>
	<header>
		<h2><a href="<?= get_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part('parts/meta/date-authorlink'); ?>
	</header>
		<?php the_excerpt(); ?>
		<?php get_template_part('parts/meta/readmore'); ?>&nbsp;<?php get_template_part('parts/meta/comments'); ?>		
</article>