<?php 
/*
 * Monolith
 * Single post template
 *
 */
?>

<?php get_header() // global header ?>
<div class="wrapper-main" role="document">
	<div class="<?= CONTAINER_CLASSES; ?>">
		<? get_template_part('parts/breadcrumb'); // load the breadcrumbs ?>
		<? get_template_part('parts/post-header'); // load the post header part ?>		
		<div class="<?= ROW_CLASSES ?>">
			<div class="<?= MAIN_SIZE ?>" role="main">						
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<? get_template_part('parts/post-content') // load single post content part ?>
				<?php endwhile; ?>			
			</div><!-- /MAIN_SIZES -->			
			<? get_template_part('parts/sidebar'); // load the sidebar ?>		
		</div><!-- /ROW_CLASSES -->	
	</div><!-- /CONTAINER_CLASSES -->
</div><!-- /main -->
<?php get_footer(); // global footer ?>