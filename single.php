<?php // Single Post ?> 
<? get_template_parts( array( 'parts/html-header', 'parts/header' ) ); // load headers ?>
<div id="main">
	<div class="<?= CONTAINER_CLASSES; ?>">	
		<div class="<?= ROW_CLASSES ?>">
			<div class="span<?= MAIN_SIZE ?>">
				<? get_template_part('parts/loop-post'); // el loado loopo posto ?>
			</div><? //span8 ?>
			<? get_template_part('parts/sidebar-right'); // el loado sidebaro ?>
		</div><? //row ?>
	</div><? //container ?>
</div><? //main ?>
<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); // load footer files ?>