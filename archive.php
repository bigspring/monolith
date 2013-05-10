<?php get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>

<div id="main" role="main">

	<div class="<?= CONTAINER_CLASSES; ?>">
	
	<? get_template_part('parts/breadcrumb'); // load breadcrumb ?>
	
		<div class="<?= ROW_CLASSES ?>">

			<? get_template_part('parts/sidebar-left'); // el loado left sidebaro ?>			

			<div class="span<?= MAIN_SIZE ?>">

				<header class="page-header archive-header">								
					<?php if ( is_day() ) : ?>
							<h1 class="archive-title h1">Archive: <?php echo  get_the_date( 'D F Y' ); ?></h1>
							<?php elseif ( is_month() ) : ?>
							<h1 class="archive-title h1">Archive: <?php echo  get_the_date( 'F Y' ); ?></h1>
							<?php elseif ( is_year() ) : ?>
							<h1 class="archive-title h1">Archive: <?php echo  get_the_date( 'Y' ); ?></h1>							
							<?php else : ?>
							<h1 class="archive-title h1">Archive</h1>
					<?php endif; ?>
				</header>
		
				<?php get_template_part('parts/loop-posts') // load the posts loop ?>

			</div><!-- MAIN_SIZE -->

			<? get_template_part('parts/sidebar-right'); // right sidebar ?>

		</div><!-- /ROW_CLASSES -->	

	</div><!-- /CONTAINER_CLASSES -->

</div><!-- /main -->	

<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>