        </div><!-- end the main structural div (.columns) -->

        <!-- start the sidebar -->
        <?php if ( ! fullwidth_conditions() ) : // do not load sidebar if any of the fullwidth rules apply ?>
          <div id="sidebar" class="columns <?= SIDEBAR_SIZE; ?> sidebar" role="complementary">
            <?php get_template_part('layouts/organisms/sidebar'); ?>
          </div>
        <?php endif; ?>
        <!-- end the sidebar -->

      </div><!-- /end the .row -->

    </main>

    <!-- the site footer -->
    <?php get_template_part('layouts/organisms/site-footer'); ?>

    <?php if (ENVIRONMENT === 'development') : ?>
        <!-- debug stuff -->
      <div class="debug"></div>
      <script src="//localhost:35729/livereload.js"></script>
    <?php endif; ?>
    <?php wp_footer(); ?>

  </body>
</html>
