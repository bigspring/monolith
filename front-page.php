<?php get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>

<!-- hero unit -->
<div class="hero">
	<div class="<?= CONTAINER_CLASSES; ?>">
		<header class="hero-unit">
			<h1>Heading</h1>
			<p>Tagline</p>
			<p><a class="btn btn-primary btn-large">Learn more</a></p>
		</header>
	</div>
</div>

<!-- main content -->
<div class="main" role="document">
	
	<div class="<?= CONTAINER_CLASSES; ?>">

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