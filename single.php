<?php // Single Post ?> 
<? get_template_parts( array( 'parts/html-header', 'parts/header' ) ); // load headers ?>
<div id="main">
	<div class="<?= CONTAINER_CLASSES; ?>">	
		<div class="<?= ROW_CLASSES ?>">
			<div class="span<?= MAIN_SIZE ?>">

				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
				<? get_template_part('parts/post/post-single') // load single post ?>
				<?php endwhile; ?>

			</div><? //span8 ?>
			<? get_template_part('parts/sidebar-right'); // el loado sidebaro ?>
		</div><? //row ?>
	</div><? //container ?>
</div><? //main ?>
<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); // load footer files ?>