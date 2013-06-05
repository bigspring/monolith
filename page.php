<?php // Default Page Template ?>

<? get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>

<div class="main" role="document">
	
	<div class="<?= CONTAINER_CLASSES; ?>">

		<? get_template_part('parts/breadcrumb'); // load the breadcrumbs ?>

		
		<div class="<?= ROW_CLASSES ?>">
			
			<div class="span<?= MAIN_SIZE ?>" role="main">			
							
				<? get_template_part('parts/page-header'); // load the page header ?>
				<? get_template_part('parts/page-content'); // load the page content ?>
			
			</div><!-- /MAIN_SIZES -->
			
			<? get_template_part('parts/sidebar'); // load the right sidebar ?>
		
		</div><!-- /ROW_CLASSES -->	

	</div><!-- /CONTAINER_CLASSES -->

</div><!-- /main -->
<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>