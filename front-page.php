<?php get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>

<div id="hero">
	<div class="<?= CONTAINER_CLASSES; ?>">
		<header class="hero-unit">
			<h1>Heading</h1>
			<p>Tagline</p>
			<p><a class="btn btn-primary btn-large">Learn more</a></p>
		</header>
	</div><? //container ?>
</div><? //hero ?>

<div id="main">
	<div class="<?= CONTAINER_CLASSES; ?>">
		<div class="<?= ROW_CLASSES ?>">
			<? get_template_part('parts/sidebar-left'); // el loado sidebaro ?>
			<div class="span<?= MAIN_SIZE ?>">
				<? get_template_part('parts/loop-page'); // load the posts loop ?>
			</div><? //span8 ?>	
			<? get_template_part('parts/sidebar-right'); // el loado sidebaro ?>
		</div><? //row ?>	
	</div><? //container ?>
</div><!-- /main -->	

<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>