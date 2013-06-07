<div class="navbar">
  <div class="navbar-inner">
    <div class="container">
 
      <!-- .btn-navbar is used as the toggle for collapsed navbar content -->
      <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
        <span class="icon-bar"></span>
      </a>
 
      <!-- Be sure to leave the brand out there if you want it shown -->
      <a class="brand" href="<?php home_url() ?>"><?php bloginfo('name') ?></a>
 
      <!-- Everything you want hidden at 940px or less, place within here -->
      <div class="nav-collapse collapse">
		<?php
			$args = array(
				'theme_location' => 'top-bar',
				'depth'		 => 2,
				/*'container'	 => false, */
				'menu_class'	 => 'nav pull-right',
				'walker'	 => new Monolith_Nav_Walker()
			);
		
			wp_nav_menu($args);
		?>
      </div>
 
    </div>
  </div>
</div>
