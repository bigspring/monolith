<?php // WordPress index ?>
<?php get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>

<div class="<?= CONTAINER_CLASSES; ?>">
	<?php get_template_part('parts/breadcrumb'); ?>
	<div class="<?= ROW_CLASSES ?>">
		<? get_template_part('parts/sidebar-left'); // el loado left sidebaro ?>			
		<div class="span<?= MAIN_SIZE ?>">
			<div class="page-header">
				<h1>Latest Posts</h1>	
			</div>
				<?php while ( have_posts() ) : the_post(); ?>
				<article id="post-<?= the_id() ?>" class="post">
					<header>
						<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
						<?php get_template_part('parts/postmeta'); ?>
					</header>
					<?php the_excerpt(); ?>
				</article>
				<?php endwhile; // End the loop. Whew. ?>
		</div><!-- /.span -->
		<? get_template_part('parts/sidebar-right'); // el loado sidebaro ?>
	</div><!-- /ROW_CLASSES -->
</div><!-- /CONTAINER_CLASSES -->
<?php get_template_parts( array( 'parts/footer','parts/html-footer') ); ?>