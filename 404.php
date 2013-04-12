<?php // 404 page ?>
<? get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>

<div id="main">

	<div class="<?= CONTAINER_CLASSES; ?>">

	<? get_template_part('parts/breadcrumb'); // load the bradcrumb ?>

		<div class="<?= ROW_CLASSES ?>">

			<? get_template_part('parts/sidebar-left'); // load the left sidebar ?>			

			<div class="span<?= MAIN_SIZE ?>">

				<h2 class="entry-title">404 - Page not found</h2>
				<p class="entry-content">The page you're looking wasn't found. Try searching for the page you're looking for:</p>

				<form id="searchform-404" class="blog-search" method="get" action="<?php bloginfo('home') ?>">
					<div>
						<input id="s-404" name="s" class="text" type="text" value="<?php the_search_query() ?>" size="40" />
						<input class="button" type="submit" value="" />
					</div>
				</form>

			</div><!-- /MAIN_SIZES -->

			<? get_template_part('parts/sidebar-right'); // load the right sidebar ?>

		</div><!-- /ROW_CLASSES -->	

	</div><!-- /CONTAINER_CLASSES -->

</div><!-- /main -->

<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>