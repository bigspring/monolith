<article itemscope itemtype="http://schema.org/Article" <?php post_class(); ?>>	
	
	<header class="page-header">		
		<h1 class="post-title" itemprop="headline"><?php the_title(); ?></h1>		
		<?php get_template_part('parts/meta/date-authorlink'); ?>	
	</header>
	
	<?php if ($post->post_excerpt != '') { // show the excerpt if it exists ?>
	<section class="post-excerpt lead" itemprop="description">		
		<?php the_excerpt(); ?>		
	</section>
	<? } ?>
	
	<section class="post-content" itemprop="articleBody">	
		<?php the_content(); ?>	
	</section>
		
	<footer class="post-footer">	
		<? get_template_part('parts/author-snippet') // load the author snippet part ?>		
		<?php comments_template( '', true ); ?>
	</footer>	

</article>