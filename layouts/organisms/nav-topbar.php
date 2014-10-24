<?php
 // Monolith by BigSpring
 // Licensed under MIT Open Source
?>

<!-- start the site header -->
<header class="block-header" role="banner">
</header>
<!-- end the header -->



<div class="top-bar-container contain-to-grid show-for-medium-up" role="navigation">
<nav class="top-bar" data-topbar="">
<ul class="title-area">
  <li class="name">
    <h1><a href="<?php echo home_url(); ?>"><?php bloginfo('name'); ?></a></h1>
  </li>
</ul>
<section class="top-bar-section">
  <?php
  	$args = array(
      'container' => false, // remove nav container
      'container_class' => '', // class of container
      'menu' => '', // menu name
      'menu_class' => 'top-bar-menu left', // adding custom nav class
      'theme_location' => 'top-bar', // where it's located in the theme
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

  <?php get_template_part('layouts/molecules/top-bar-search-form'); ?>

</section>
</nav>
</div>
