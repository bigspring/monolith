<? // monolith: default page template ?>

<?php get_header() ?>
<div class="wrap-main">		
		<div class="<?= CONTAINER_CLASSES; ?>">
			<? get_template_part('parts/breadcrumb'); // load the breadcrumbs ?>					
			
			<div class="<?= ROW_CLASSES ?>">			
				<main class="<?= MAIN_SIZE ?>" role="main">	
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>	
				
					<? get_template_part('parts/title'); ?>
					<? get_template_part('parts/content'); ?>					
					
					<?php endwhile; ?>
				</main><!-- /.main -->	
				<? get_template_part('parts/sidebar'); // load the main sidebar ?>		
			</div><!-- /.row -->	
		</div><!-- /.container -->
</div><!-- /.wrap-main -->
<?php get_footer(); ?>