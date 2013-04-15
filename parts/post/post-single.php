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
	
		<?php if ( get_the_author_meta( 'description' ) ) : ?>
			<hr/>
			<div class="media">								
				
				<div class="author-image pull-left" itemprop="image"><?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?></div>
				
				<div class="media-body">
					<h3 class="author-name" itemprop="name">About <?php echo get_the_author() ; ?></h3>
					<div class="author-description" itemprop="description"><?php the_author_meta( 'description' ); ?></div>
				</div>
			
			</div>
		<?php endif; ?>
		
		<hr/>
		<?php comments_template( '', true ); ?>

	</footer>	

</article>