<!-- start the footer -->
<footer class="block-footer" role="contentinfo">
  <hr/>
  <div class="row">
    <div class="medium-8 columns">

      <!-- start the footer menu -->
      <ul class="inline-list footer-list">
        <!-- static list item for copyright / date -->
        <li>&copy; <?= date( 'Y' ); ?> <?php bloginfo( 'name' ); ?></li>

        <!-- start menu items -->
        <?php // args for the custom footer menu
        $args = array(
          'container'       => false, // remove nav container
          'items_wrap'      => '%3$s', // remove ul
          'container_class' => '', // class of container
          'menu'            => '', // menu name
          'menu_class'      => 'footer-menu', // adding custom nav class
          'theme_location'  => 'footer', // where it's located in the theme
          'before'          => '', // before each link <a>
          'after'           => '', // after each link </a>
          'link_before'     => '', // before each link text
          'link_after'      => '', // after each link text
          'depth'           => 5, // limit the depth of the nav
          'fallback_cb'     => false,
        );

        wp_nav_menu( $args );
        ?>
        <!-- end menu items -->


      </ul>
      <!-- end the footer menu -->

      <?//= do_shortcode('[contact_details class="inline-list" delimiter=", "]'); // display the address ?>

    </div>
    <!-- /.columns -->

    <div class="medium-4 columns">
      <?php get_template_part( 'layouts/molecules/social-media-icons' ); // load the social media icons ?>
    </div>
    <!-- /.columns -->
  </div>
  <!-- /.row -->
</footer>
<!-- end the footer -->