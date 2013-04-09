<?php get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>
<div id="main">
	<div class="<?= CONTAINER_CLASSES; ?>">
	<? get_template_part('parts/breadcrumb'); // el loado breadcrumbo ?>
		<div class="<?= ROW_CLASSES ?>">
			<? get_template_part('parts/sidebar-left'); // el loado left sidebaro ?>			
			<div class="span<?= MAIN_SIZE ?>">

				<div class="page-header"><h1>
				<?php if ( is_day() ) : ?>
						Archive: <?php echo  get_the_date( 'D M Y' ); ?>					
						<?php elseif ( is_month() ) : ?>
						Archive: <?php echo  get_the_date( 'M Y' ); ?>
						<?php elseif ( is_year() ) : ?>
						Archive: <?php echo  get_the_date( 'Y' ); ?>								
						<?php else : ?>
						Archive	
				<?php endif; ?>
				</h1></div>
		
				<?php get_template_part('parts/loop-posts') // load the posts loop ?>

			</div><!-- MAIN_SIZE -->
			<? get_template_part('parts/sidebar-right'); // el loado right sidebaro ?>
		</div><!-- /ROW_CLASSES -->	
	</div><!-- /CONTAINER_CLASSES -->
</div><!-- /main -->	
<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>