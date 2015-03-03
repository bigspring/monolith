          </div><!-- end the main structural div (.columns) -->
          
          <!-- start the sidebar -->
          <?php if( !is_page_template('page-fullwidth.php') ) : // do not load sidebar if using fullwidth template ?>
          <div id="sidebar" class="columns <?= SIDEBAR_SIZE; ?> sidebar" role="complementary">      
            <?php get_template_part('layouts/organisms/sidebar'); ?> 
          </div>
          <?php endif; ?>
          <!-- end the sidebar -->
          
        </div><!-- /end the .row -->

        <!-- the site footer -->
        <?php get_template_part('layouts/organisms/site-footer'); ?>
       
        <?php if (ENVIRONMENT === 'development') : ?>
            <!-- debug stuff -->
            <div class="debug">
                <!-- use this section to test out features in development mode -->
            </div>
        <?php endif; ?>
        <script src="<?= get_asset_uri('js', 'base') ?>"></script>
        <?php wp_footer(); ?>
				
				<?php /* load the fail rem code for ie only */ ?>
				<!--[if lt IE 9]>
				<script src="<?= get_template_directory_uri(); ?>/assets/bower_components/REM-unit-polyfill/js/rem.min.js" type="text/javascript"></script>
				<![endif]-->

    </body>
</html>