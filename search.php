<?php get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>
<div id="main">
	<div class="<?= CONTAINER_CLASSES; ?>">
	<? get_template_part('parts/breadcrumb'); // el loado sidebaro ?>
		<div class="<?= ROW_CLASSES ?>">
			<? get_template_part('parts/sidebar-left'); // el loado left sidebaro ?>			
			<div class="span<?= MAIN_SIZE ?>">
				<?php if ( have_posts() ): ?>
				<div class="page-header">
					<h2>Search Results for '<?php echo get_search_query(); ?>'</h2>	
				</div>
				<ul class="unstyled">
				<?php while ( have_posts() ) : the_post(); ?>
					<li>
						<article>
							<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							<?php get_template_part('parts/meta/date'); ?>
							<?php the_excerpt(); ?>
							<?php get_template_part('parts/meta/readmore'); ?>
						</article>
						<hr/>
					</li>
				<?php endwhile; ?>
				</ul>
				<?php else: ?>
				<h2>No results found for '<?php echo get_search_query(); ?>'</h2>
				<?php endif; ?>
			</div><!-- /MAIN_SIZE -->
			<? get_template_part('parts/sidebar-right'); // el loado right sidebaro ?>
		</div><!-- /ROW_CLASSES -->	
	</div><!-- /CONTAINER_CLASSES -->
</div><!-- /main -->
<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>