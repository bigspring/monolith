<?php
/**
 * The navbar organism that includes the search form molecule
 *
 * @package monolith
 */
?>

<!-- start main navigation -->
<div class="top-bar-container contain-to-grid" role="navigation">
  <nav class="top-bar" data-topbar>
    <ul class="title-area">
      <li class="name">
        <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
      </li>
      <!-- collapsed menu icon -->
      <li class="toggle-topbar menu-icon"><a href=""><span>Menu</span></a></li>
    </ul>
    
    <!-- start main navigation section -->
    <section class="top-bar-section">
      <?php
      	$args = array(
          'container' => false, // remove nav container
          'container_class' => '', // class of container
          'menu' => '', // menu name
          'menu_class' => 'top-bar-menu right', // adding custom nav class
          'theme_location' => 'primary-navigation', // where it's located in the theme
          'before' => '', // before each link <a>
          'after' => '', // after each link </a>
          'link_before' => '', // before each link text
          'link_after' => '', // after each link text
          'depth' => 5, // limit the depth of the nav
          'fallback_cb' => false,
      		'walker'	 => new Monolith_Nav_Walker()
      	);

      	wp_nav_menu($args);
      ?>    
    </section>
    <!-- end main navigation section -->
    
  </nav>
</div>
<!-- end main navigation -->