<?php get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>
<div id="main">
	<div class="<?= CONTAINER_CLASSES; ?>">
	<? get_template_part('parts/breadcrumb'); // el loado sidebaro ?>
		<div class="<?= ROW_CLASSES ?>">
			<? get_template_part('parts/sidebar-left'); // el loado left sidebaro ?>			
			<div class="span<?= MAIN_SIZE ?>">
				
				<div class="page-header">
					<h2>Search Results for '<?php echo get_search_query(); ?>'</h2>	
				</div>

				<?php if ( have_posts() ): ?>
					<?php get_template_part('parts/loop-posts') // load the posts loop ?>
				<?php else: ?>
					<div class="alert">No results found for '<?php echo get_search_query(); ?>'</div>
				<?php endif; ?>

			</div><!-- /MAIN_SIZE -->
			<? get_template_part('parts/sidebar-right'); // el loado right sidebaro ?>
		</div><!-- /ROW_CLASSES -->	
	</div><!-- /CONTAINER_CLASSES -->
</div><!-- /main -->
<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>