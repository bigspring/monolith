<article itemscope itemtype="http://schema.org/Article" <?php post_class(); ?>>	
	
	<!-- main content -->
	<main class="main" itemprop="articleBody" role="main">	

		<?php if ($post->post_excerpt != '') { // show the excerpt if it exists ?>
		<section class="post-excerpt lead" itemprop="description">		
			<?php the_excerpt(); ?>		
		</section>
		<? } ?>

		<section class="post-content">
			<?php the_content(); ?>	
		</section>
	
	</main>
		
	<!-- post footer -->
	<footer class="post-footer">			
		<hr/>
		<? get_template_part('parts/author-snippet') // load the author snippet part ?>				
	</footer>	

</article>