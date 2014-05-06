<? // monolith: default page template ?>

<?php get_header() ?>
<div class="wrap-main">		
		<div class="<?= CONTAINER_CLASSES; ?>">
			<? get_template_part('parts/breadcrumb'); // load the breadcrumbs ?>					
			<? get_template_part('parts/page-header'); // load the page header part ?>
			<div class="<?= ROW_CLASSES ?>">			
				<main class="<?= MAIN_SIZE ?>" role="main">						
					<? get_template_part('parts/page-content'); // load the page content part ?>			
				</main><!-- /.main -->	
				<? get_template_part('parts/sidebar'); // load the main sidebar ?>		
			</div><!-- /.row -->	
		</div><!-- /.container -->
</div><!-- /.wrap-main -->
<?php get_footer(); ?>