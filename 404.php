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
					<p class="lead">The page you're looking for wasn't found. Try one of the following links to find your way:</p>
					<ul>
						<li><a href="<?= home_url() ?>" title="<?= bloginfo('name')?>">Home</a></li>
					</ul>
				</section>				
				
				<hr/>
				<footer class="404-search-form">
					<p class="lead">Or try searching the site instead:</p>
					<? get_template_part('searchform') ?>
				</footer>

			</div><!-- /main -->
				
		</div><!-- /ROW_CLASSES -->	

	</div><!-- /CONTAINER_CLASSES -->

</div><!-- /main -->

<?php get_footer(); ?>