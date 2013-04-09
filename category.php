<?php get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>
<div id="main">
	<div class="<?= CONTAINER_CLASSES; ?>">
	<? get_template_part('parts/breadcrumb'); // el loado sidebaro ?>
		<div class="<?= ROW_CLASSES ?>">
			<? get_template_part('parts/sidebar-left'); // el loado left sidebaro ?>			
			<div class="span<?= MAIN_SIZE ?>">

				<div class="page-header">
					<h1>Category Archive: <?php echo single_cat_title( '', false ); ?></h1>
				</div>

				<?php get_template_part('parts/loop-posts') // load the posts loop ?>

			</div><!-- /MAIN_SIZE -->
			<? get_template_part('parts/sidebar-right'); // el loado right sidebaro ?>
		</div><!-- /ROW_CLASSES -->	
	</div><!-- /CONTAINER_CLASSES -->
</div><!-- /main -->	
<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>