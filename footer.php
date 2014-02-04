	    <hr/>
	    <div class="wrapper-footer">
	        <div class="<?= CONTAINER_CLASSES; ?>">
	            <p>&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
	        </div><!-- /. container -->
	    </div>
	    
	    <?php wp_footer(); ?>
	
	    <!-- load los javascript files -->
	    <script src="<?php echo get_stylesheet_directory_uri(); ?>/library/bower_components/modernizr/modernizr.js"></script>
	    <script src="<?php echo get_stylesheet_directory_uri(); ?>/library/bower_components/holderjs/holder.js"></script>
	    <script src="<?php echo get_stylesheet_directory_uri(); ?>/library/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
    </body>
</html>