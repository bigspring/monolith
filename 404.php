<?php // 404 page ?>

<?php // Default Page Template ?>

<? get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>

<div class="main" role="document">
	
	<div class="<?= CONTAINER_CLASSES; ?>">

		<? get_template_part('parts/breadcrumb'); // load the breadcrumbs ?>

		<div class="<?= ROW_CLASSES ?>">
			
			<? get_template_part('parts/sidebar-left'); // load the left sidebar ?>		
			
			<div class="span<?= FULLWIDTH_SIZE ?> content" role="main">			
			
				<header class="page-header 404-header">
					<h1 class="page-title h1">404 error - page not found</h1>
				</header>

				<section class="entry-content">
					<p class="entry-content">The page you're looking wasn't found. Try searching instead:</p>
				</section>
				
				<!-- search form -->				
				<section class="404-search-form">
					<form id="searchform-404" class="blog-search form-search" method="get" action="<?php bloginfo('home') ?>">	
							<input id="s-404" name="s" class="text" type="text" value="<?php the_search_query() ?>" size="40" />
							<button class="btn" type="submit">Search <? bloginfo('name') ?></button>					
					</form>
				</section>

			</div><!-- /main -->
				
		</div><!-- /ROW_CLASSES -->	

	</div><!-- /CONTAINER_CLASSES -->

</div><!-- /main -->

<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>