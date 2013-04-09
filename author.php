<?php get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>
<div id="main">
	<div class="<?= CONTAINER_CLASSES; ?>">
	<? get_template_part('parts/breadcrumb'); // el loado breadcrumbo ?>
		<div class="<?= ROW_CLASSES ?>">
			<? get_template_part('parts/sidebar-left'); // el loado left sidebaro ?>			
			<div class="span<?= MAIN_SIZE ?>">
				<?php if ( have_posts() ): the_post(); ?>
				
				<div class="page-header">
					<h1>Author Archives: <?php echo get_the_author() ; ?></h1>
				</div>
				
				<?php if ( get_the_author_meta( 'description' ) ) : ?>
				<?php echo get_avatar( get_the_author_meta( 'user_email' ) ); ?>
				<h3>About <?php echo get_the_author() ; ?></h3>
				<?php the_author_meta( 'description' ); ?>
				<?php endif; ?>
				
				<?php rewind_posts(); while ( have_posts() ) : the_post(); ?>
					<? get_template_part('parts/post/post-snippet') ?>
				<?php endwhile; ?>
				
				<?php else: ?>
				<h2>No posts to display for <?php echo get_the_author() ; ?></h2>	
				<?php endif; ?>
			</div><!-- /MAIN_SIZE -->
			<? get_template_part('parts/sidebar-right'); // el loado right sidebaro ?>
		</div><!-- /ROW_CLASSES -->	
	</div><!-- /CONTAINER_CLASSES -->
</div><!-- /main -->	
<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>