<? // markup for post snippet, used in loops and queries ?>
<article itemscope itemtype="http://schema.org/Article" <?php post_class(); ?>>

	<header class="snippet-title">
		<h2 class="snippet-headline" itemprop="name"><a href="<?= get_permalink() ?>" title="<?php the_title(); ?>" class="post-permalink" itemprop="url"><?php the_title(); ?></a></h2>
		<?php get_template_part('parts/meta/date'); ?>
	</header>
	
	<section class="snippet-excerpt">
		<p itemprop="description"><?= get_the_excerpt(); ?></p>
	</section>	
	
	<footer class="snippet-footer">
		<?php get_template_part('parts/meta/readmore'); ?>
	</footer> <!-- end article footer -->

</article>
<hr/>