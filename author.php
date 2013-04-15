<?php get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>

<section id="main">

	<div class="<?= CONTAINER_CLASSES; ?>">

	<? get_template_part('parts/breadcrumb'); // el loado breadcrumbo ?>

		<div class="<?= ROW_CLASSES ?>">

			<? get_template_part('parts/sidebar-left'); // el loado left sidebaro ?>			

			<div class="span<?= MAIN_SIZE ?>">
				
				<?php if ( have_posts() ): the_post(); ?>
				
				<article class="author-profile" itemscope itemtype="http://schema.org/Person">
				
					<header class="author-header page-header">
						<section class="author-image pull-right" itemprop="image">
							<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
						</section>
						<h1 class="author-name" itemprop="name"><?php echo get_the_author() ; ?></h1>
						<?php if ( get_the_author_meta( 'description' ) ) : ?>							
							<?php the_author_meta( 'description' ); ?>
						<?php endif; ?>					
					</header>
					
					<hr/>
					
					<section class="author-posts">
					
						<?php rewind_posts(); while ( have_posts() ) : the_post(); // author posts loop ?>
							<? get_template_part('parts/post/post-snippet') ?>
						<?php endwhile; ?>
					
					</section>
				
				</article>
				
				<?php else: ?>
				<section>					
					<h2>No posts to display for <?php echo get_the_author() ; ?></h2>					
				</section>
				<?php endif; ?>				
				
			</div><!-- /MAIN_SIZE -->
			<? get_template_part('parts/sidebar-right'); // el loado right sidebaro ?>
		</div><!-- /ROW_CLASSES -->	
	</div><!-- /CONTAINER_CLASSES -->
</section><!-- /main -->	

<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>