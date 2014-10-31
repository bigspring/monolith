        </main>
        <!-- end block-main -->

        <!-- start the footer -->
        <footer class="block-footer" role="contentinfo">
            <hr/>
            <div class="row">
            <div class="medium-8 columns">

                    <!-- start the footer menu -->
                    <ul class="inline-list footer-list">
                      <!-- static list item for copyright / date -->
                      <li>&copy; <?= date('Y'); ?> <?php bloginfo('name'); ?></li>

                        <!-- start menu items -->
                        <li><a href="#">Link 2</a></li>
                      <li><a href="#">Link 3</a></li>
                      <li><a href="#">Link 4</a></li>
                      <li><a href="#">Link 5</a></li>
                      <!-- end menu items -->

                    </ul>
                    <!-- end the footer menu -->

                </div><!-- /.columns -->

                <div class="medium-4 columns">
                    <?php get_template_part('layouts/molecules/social-media-icons'); // load the social media icons ?>
                </div><!-- /.columns -->
            </div><!-- /.row -->
        </footer>
        <!-- end the footer -->

        <?php if (ENVIRONMENT === 'development') : ?>
            <div class="debug">
                <!-- // use this section to test out features in development mode -->
            </div>
        <?php endif; ?>

        <script src="<?= get_assets_dir('js', 'base') ?>"></script>

    </body>

</html>