<?php 
/*
 * Monolith
 * Default page template
 *
 */
?>

<?php get_header() ?>

<div class="wrapper-main" role="document">
	
	<div class="<?= CONTAINER_CLASSES; ?>">

		<? get_template_part('parts/breadcrumb'); // load the breadcrumbs ?>
		
		<div class="<?= ROW_CLASSES ?>">
			
			<div class="<?= MAIN_SIZE ?>" role="main" itemscope itemtype="http://schema.org/ItemPage">			
							
				<? get_template_part('parts/page-header'); // load the page header ?>
				<? get_template_part('parts/page-content'); // load the page content ?>
			
			</div><!-- /MAIN_SIZES -->
			
			<? get_template_part('parts/sidebar'); // load the right sidebar ?>
		
		</div><!-- /ROW_CLASSES -->	

	</div><!-- /CONTAINER_CLASSES -->

</div><!-- /wrapper-main -->
<?php get_footer(); ?>