<?php get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>
<div id="main">
	<div class="<?= CONTAINER_CLASSES; ?>">
	<? get_template_part('parts/breadcrumb'); // el loado sidebaro ?>
		<div class="<?= ROW_CLASSES ?>">
			<? get_template_part('parts/sidebar-left'); // el loado left sidebaro ?>			
			<div class="span<?= MAIN_SIZE ?>">
				<?php if ( have_posts() ): ?>
				<h2>Search Results for '<?php echo get_search_query(); ?>'</h2>	
				<ol>
				<?php while ( have_posts() ) : the_post(); ?>
					<li>
						<article>
							<h2><a href="<?php esc_url( the_permalink() ); ?>" title="Permalink to <?php the_title(); ?>" rel="bookmark"><?php the_title(); ?></a></h2>
							<time datetime="<?php the_time( 'Y-m-D' ); ?>" pubdate><?php the_date(); ?> <?php the_time(); ?></time> <?php comments_popup_link('Leave a Comment', '1 Comment', '% Comments'); ?>
							<?php the_content(); ?>
						</article>
					</li>
				<?php endwhile; ?>
				</ol>
				<?php else: ?>
				<h2>No results found for '<?php echo get_search_query(); ?>'</h2>
				<?php endif; ?>
			</div>
			<? get_template_part('parts/sidebar-right'); // el loado right sidebaro ?>
		</div>	
	</div>
</div>
<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>