<?php // Default Page Template ?>
<? get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>
<div id="main">
	<div class="<?= CONTAINER_CLASSES; ?>">
	<? get_template_part('parts/breadcrumb'); // el loado sidebaro ?>
		<div class="<?= ROW_CLASSES ?>">
			<? get_template_part('parts/sidebar-left'); // el loado left sidebaro ?>			
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
			</div>
			<? get_template_part('parts/sidebar-right'); // el loado right sidebaro ?>
		</div>	
		</div>
	</div>
</div>
<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>