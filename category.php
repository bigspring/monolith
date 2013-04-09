<?php get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>
<div id="main">
	<div class="<?= CONTAINER_CLASSES; ?>">
	<? get_template_part('parts/breadcrumb'); // el loado sidebaro ?>
		<div class="<?= ROW_CLASSES ?>">
			<? get_template_part('parts/sidebar-left'); // el loado left sidebaro ?>			
			<div class="span<?= MAIN_SIZE ?>">

				<?php if ( have_posts() ): ?>
				<div class="page-header">
					<h1>Category Archive: <?php echo single_cat_title( '', false ); ?></h1>
				</div>
				<ul class="unstyled">
					<?php while ( have_posts() ) : the_post(); ?>
						<li <?php post_class(); ?>>	
							<header>
								<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
								<?php get_template_part('parts/meta/date'); ?>
							</header>
								<?php the_excerpt(); ?>
								<?php get_template_part('parts/meta/readmore'); ?>		
						</li>
						<hr/>
					<?php endwhile; ?>
				</ul>
				<?php else: ?>
				<h2>No posts to display in <?php echo single_cat_title( '', false ); ?></h2>
				<?php endif; ?>
			</div><!-- /MAIN_SIZE -->
			<? get_template_part('parts/sidebar-right'); // el loado right sidebaro ?>
		</div><!-- /ROW_CLASSES -->	
	</div><!-- /CONTAINER_CLASSES -->
</div><!-- /main -->	
<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>