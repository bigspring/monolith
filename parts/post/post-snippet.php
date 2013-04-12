<? // markup for post snippet, used in loops and queries ?>
<article <?php post_class(); ?>>

	<header>
		<h2 itemprop="name"><a href="<?= get_permalink() ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h2>
		<?php get_template_part('parts/meta/date-authorlink'); ?>
	</header>
	
	<section class="entry-content" itemprop="description">
		<?php the_excerpt(); ?>		
	</section>	
	
	<footer class="article-footer">
		<?php get_template_part('parts/meta/readmore'); ?>
	</footer> <!-- end article footer -->

</article>

<hr/>