<? // markup for post snippet, used in loops and queries ?>
<article itemscope itemtype="http://schema.org/Article" <?php post_class(); ?>>

	<header>
		<h2 class="post-headline" itemprop="name"><a href="<?= get_permalink() ?>" title="<?php the_title(); ?>" class="post-permalink" itemprop="url"><?php the_title(); ?></a></h2>
		<p><?php get_template_part('parts/meta/date-authorlink'); ?></p>
	</header>
	
	<section class="post-excerpt" itemprop="description">
		<?php the_excerpt(); ?>		
	</section>	
	
	<footer class="article-footer">
		<?php get_template_part('parts/meta/readmore'); ?>
	</footer> <!-- end article footer -->

</article>
<hr/>