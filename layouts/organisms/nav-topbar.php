<?php
/**
 * The navbar organism that includes the search form molecule
 *
 * @package monolith
 */
?>

<!-- start main navigation -->
<header class="block-header top-bar-container contain-to-grid">
  <nav class="top-bar" data-topbar role="navigation" data-options="is_hover: false">

    <!-- start the title area -->
    <ul class="title-area">
      <li class="name">
        <h1><a href="<?php echo home_url(); ?>"><?php bloginfo( 'name' ); ?></a></h1>
      </li>
      <li class="toggle-topbar menu-icon"><a href=""><span><?php _e( 'Menu', 'monolith' ); ?></span></a></li>
    </ul>
    <!-- end the title area -->

    <!-- start main navigation section -->
    <section class="top-bar-section main-navigation">
      <?php
      $args = array(
        'container'       => false, // remove nav container
        'container_class' => '', // class of container
        'menu'            => '', // menu name
        'menu_class'      => 'top-bar-menu right', // adding custom nav class
        'theme_location'  => 'primary-navigation', // where it's located in the theme
        'before'          => '', // before each link <a>
        'after'           => '', // after each link </a>
        'link_before'     => '', // before each link text
        'link_after'      => '', // after each link text
        'depth'           => 5, // limit the depth of the nav
        'fallback_cb'     => false,
        'walker'          => new Monolith_Nav_Walker()
      );

      wp_nav_menu( $args );
      ?>
    </section>
    <!-- end main navigation section -->

  </nav>
</header>
<!-- end main navigation -->
