<?php 
/*
 * Monolith
 * Single post template
 *
 */
?>

<?php get_header() ?>

<div class="wrapper-main" role="document">
	
	<div class="<?= CONTAINER_CLASSES; ?>">

		<? get_template_part('parts/breadcrumb'); // load the breadcrumbs ?>

		<div class="<?= ROW_CLASSES ?>">

			<div class="<?= MAIN_SIZE ?>" role="main">			
			
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<? get_template_part('parts/post-content') // load single post ?>
				<?php endwhile; ?>
			
			</div><!-- /MAIN_SIZES -->
			
			<? get_template_part('parts/sidebar'); // load the right sidebar ?>
		
		</div><!-- /ROW_CLASSES -->	

	</div><!-- /CONTAINER_CLASSES -->

</div><!-- /main -->

<?php get_footer(); ?>