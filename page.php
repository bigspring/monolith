<?php // Default Page Template ?>

<? get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>

<div class="main" role="document">
	
	<div class="<?= CONTAINER_CLASSES; ?>">

		<? get_template_part('parts/breadcrumb'); // load the breadcrumbs ?>

		<div class="<?= ROW_CLASSES ?>">
			
			<? get_template_part('parts/sidebar-left'); // load the left sidebar ?>		
			
			<div class="span<?= MAIN_SIZE ?>" role="main">			
			
				<? get_template_part('parts/loop-page'); // load the page loop ?>
			
			</div><!-- /MAIN_SIZES -->
			
			<? get_template_part('parts/sidebar-right'); // load the right sidebar ?>
		
		</div><!-- /ROW_CLASSES -->	

	</div><!-- /CONTAINER_CLASSES -->

</div><!-- /main -->

<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>