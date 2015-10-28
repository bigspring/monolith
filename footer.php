        </div><!-- end the main structural div (.columns) -->

        <!-- start the sidebar -->
        <?php if ( ! is_page_template( 'page-fullwidth.php' ) && !is_404() && !is_search() ) : // do not load sidebar if using fullwidth template ?>
          <div id="sidebar" class="columns <?= SIDEBAR_SIZE; ?> sidebar" role="complementary">
            <?php get_template_part( 'layouts/organisms/sidebar' ); ?>
          </div>
        <?php endif; ?>
        <!-- end the sidebar -->

      </div><!-- /end the .row -->

    </main>

    <!-- the site footer -->
    <?php get_template_part( 'layouts/organisms/site-footer' ); ?>

    <?php if ( ENVIRONMENT === 'development' ) : ?>
      <!-- dev specific stuff -->
      <div class="debug"></div>
      <script src="//localhost:35729/livereload.js"></script>
    <?php endif; ?>
    <script src="<?= get_asset_uri( 'js', 'base' ) ?>"></script>
    <?php wp_footer(); ?>

  </body>
</html>
