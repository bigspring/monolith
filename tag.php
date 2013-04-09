<?php // Default Tag Template ?>
	<? get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>
	<div id="main">
		<div class="<?= CONTAINER_CLASSES; ?>">
		<? get_template_part('parts/breadcrumb'); // el loado sidebaro ?>
			<div class="<?= ROW_CLASSES ?>">
				<? get_template_part('parts/sidebar-left'); // el loado left sidebaro ?>			
				<div class="span<?= MAIN_SIZE ?>">

					<div class="page-header">
						<h2>Tag Archive: <?php echo single_tag_title( '', false ); ?></h2>
					</div>

					<?php get_template_part('parts/loop-posts') // load the posts loop ?>

				</div><!-- /MAIN_SIZES -->
				<? get_template_part('parts/sidebar-right'); // el loado right sidebaro ?>
			</div><!-- /ROW_CLASSES -->	
		</div><!-- /CONTAINER_CLASSES -->
	</div><!-- /main -->
<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>