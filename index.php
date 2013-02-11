<?php // WordPress index ?>

<?php get_template_parts( array( 'parts/html-header', 'parts/header' ) ); // load the header part ?>

<div id="main">

	<div class="<?= CONTAINER_CLASSES; ?>">

		<?php get_template_part('parts/breadcrumb'); // load the breadcrumb part ?>

		<div class="<?= ROW_CLASSES ?>">
			
			<? get_template_part('parts/sidebar-left'); // load the left sidebar ?>			
			
			
			<div class="span<?= MAIN_SIZE ?>">
				<? get_template_part('parts/loop-post'); // load the posts loop ?>
			</div>
			
			
			<? get_template_part('parts/sidebar-right'); // load the right sidebar ?>

		</div> <? // end row ?>

	</div> <? // end conteiner ?>

</div> <? // end #main ?>

<?php get_template_parts( array( 'parts/footer','parts/html-footer') ); // load the footer part ?>