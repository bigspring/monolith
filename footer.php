    <hr/>
    <div class="wrapper-footer">
        <div class="<?= CONTAINER_CLASSES; ?>">
            <p>&copy; <?php echo date("Y"); ?> <?php bloginfo( 'name' ); ?>. All rights reserved.</p>
        </div><!-- /. container -->
    </div>
    
    <?php wp_footer(); ?>

    <!-- load los javascript files -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/modernizr.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/css_browser_selector.js"></script>

    <!-- optional js -->
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/holder.js"></script>

    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap/alert.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap/button.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap/carousel.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap/collapse.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap/dropdown.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap/modal.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap/scrollspy.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap/tab.js"></script>
    <script src="<?php echo get_stylesheet_directory_uri(); ?>/js/bootstrap/transition.js"></script>
    </body>
</html>