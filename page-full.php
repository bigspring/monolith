<?php
/*
Template Name: Full Width
*/
?>
<? get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>
<div id="main">
	<div class="<?= CONTAINER_CLASSES; ?>">
	<? get_template_part('parts/breadcrumb'); // el loado breadcrumbo ?>
		<div class="<?= ROW_CLASSES ?>">
			<div class="span<?= FULLWIDTH_SIZE ?>">
				<? get_template_part('parts/loop-page'); // loado el loopo ?>
			</div><!-- /MAIN_SIZES -->
		</div><!-- /ROW_CLASSES -->	
	</div><!-- /CONTAINER_CLASSES -->
</div><!-- /main -->
<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>