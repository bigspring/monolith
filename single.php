<? // monolith: default single post template ?>

<?php get_header() ?>
<div class="wrap-main">		
		<div class="container">
			<? get_template_part('parts/breadcrumb'); // load the breadcrumbs ?>					
			
			<div class="row">			
				<main class="<?= MAIN_SIZE ?>" role="main">
					<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>	

					<? get_template_part('parts/title'); ?>
					<? get_template_part('parts/content'); ?>
				
					<!-- post footer -->
					<aside class="post-footer" role="complementary">			
						<hr/>
						<? get_template_part('parts/author-snippet') // load the author snippet part ?>				
					</aside>	
				
					<?php endwhile; ?>							
				</main><!-- /.main -->	

				<? get_template_part('parts/sidebar'); // load the main sidebar ?>		
			</div><!-- /.row -->	
		</div><!-- /.container -->
</div><!-- /.wrap-main -->
<?php get_footer(); ?>