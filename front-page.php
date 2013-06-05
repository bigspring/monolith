<?php get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>

<!-- hero unit -->
<div class="hero">
	<div class="<?= CONTAINER_CLASSES; ?>">
		<header class="jumbotron">
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
			
			<div class="<?= MAIN_SIZE ?>" role="main">			
							
				<? get_template_part('parts/page-header'); // load the page header ?>
				<? get_template_part('parts/page-content'); // load the page content ?>
			
			</div><!-- /MAIN_SIZES -->
			
			<? get_template_part('parts/sidebar'); // load the right sidebar ?>
		
		</div><!-- /ROW_CLASSES -->	

	</div><!-- /CONTAINER_CLASSES -->

</div><!-- /main -->

<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>