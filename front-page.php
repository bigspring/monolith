<?php
/**
 * Template Name: Front-page
 */
?> 
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
				<?php if ( have_posts() ) while ( have_posts() ) : the_post(); ?>
					<article>
						<header>
							<div class="page-header">
								<h1><?php the_title(); ?></h1>
							</div>
						</header>
						<?php the_content(); ?>					
						<footer>
							<?php // comments_template( '', true ); ?>
						</footer>
					</article>
					<?php endwhile; ?>
				<? get_template_part('parts/sidebar-right'); // el loado sidebaro ?>
			</div><? //span8 ?>	
		</div><? //row ?>	
	</div><? //container ?>
<!-- </div>/main -->	
<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>