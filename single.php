<?php // Single Post ?>

<? get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>

<div class="main" role="document">
	
	<div class="<?= CONTAINER_CLASSES; ?>">

		<? get_template_part('parts/breadcrumb'); // load the breadcrumbs ?>

		<div class="<?= ROW_CLASSES ?>">
			
			<? get_template_part('parts/sidebar-left'); // load the left sidebar ?>		
			
			<div class="span<?= MAIN_SIZE ?>" role="main">			
			
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<? get_template_part('parts/post/post-single') // load single post ?>
				<?php endwhile; ?>
			
			</div><!-- /MAIN_SIZES -->
			
			<? get_template_part('parts/sidebar-right'); // load the right sidebar ?>
		
		</div><!-- /ROW_CLASSES -->	

	</div><!-- /CONTAINER_CLASSES -->

</div><!-- /main -->

<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>