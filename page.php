<? get_template_parts( array( 'parts/html-header', 'parts/header' ) ); ?>
<? get_template_part('parts/breadcrumb'); ?>

<div class="wrapper" role="document">
	<div class="container">
		<div class="row">
		
			<div class="main content span<?= MAIN_SIZE ?>" role="main">
				<? get_template_part('parts/loops/page');?>
			</div><!-- /.main -->
			
			<aside class="sidebar sidebar-right span<?= SIDEBAR_RIGHT_SIZE ?>" role="complementary">
				<? get_template_part('parts/sidebar/sidebar');?>
			</aside><!-- /.sidebar -->
	
		</div><!-- /.row -->
	</div><!-- /.container -->
</div><!-- /.wrapper -->

<?php get_template_parts( array( 'parts/footer','parts/html-footer' ) ); ?>