<?php 
/*
 * Monolith
 * 404 template
 *
 */
?>

<?php // Default Page Template ?>

<?php get_header(); ?>

<div class="wrapper-main" role="document">
	
	<div class="<?= CONTAINER_CLASSES; ?>">

		<? // get_template_part('parts/breadcrumb'); // load the breadcrumbs ?>

		<div class="<?= ROW_CLASSES ?>">
			
			<div class="span<?= FULLWIDTH_SIZE ?> content" role="main">			
			
				<header class="page-title 404-header">
					<h1>404 error - page not found</h1>
				</header>

				<section class="entry-content">
					<p class="lead text-muted">The page you're looking wasn't found. Click on one of the following links, or try searching instead:</p>
					<ul>
						<li><a href="<?= home_url() ?>" title="<?= bloginfo('name')?>">Home</a></li>
					</ul>
				</section>				
				
				<hr/>
				<footer class="404-search-form">
					<? get_template_part('searchform') ?>
				</footer>

			</div><!-- /main -->
				
		</div><!-- /ROW_CLASSES -->	

	</div><!-- /CONTAINER_CLASSES -->

</div><!-- /main -->

<?php get_footer(); ?>