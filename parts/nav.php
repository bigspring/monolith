<div class="navbar">
<<<<<<< HEAD
  <div class="navbar-inner">
    <div class="<?= CONTAINER_CLASSES ?>">
 
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
=======
  <div class="container">

    <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-responsive-collapse">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <? // the brand ?>
    <a class="navbar-brand" href="<?= home_url(); ?>"><?= bloginfo('title') ?> </a>

    <? // Place everything within .navbar-collapse to hide it until above 768px ?>
    <div class="nav-collapse collapse navbar-responsive-collapse">

>>>>>>> 1.0-wip
		<?php
			$args = array(
				'theme_location' => 'top-bar',
				'depth'		 => 2,
<<<<<<< HEAD
				/*'container'	 => false, */
				'menu_class'	 => 'nav pull-right',
=======
				'menu_class'	 => 'nav navbar-nav pull-right',
>>>>>>> 1.0-wip
				'walker'	 => new Monolith_Nav_Walker()
			);
		
			wp_nav_menu($args);
		?>
<<<<<<< HEAD
      </div>
 
    </div>
  </div>
</div>
=======

    </div><!-- /.nav-collapse -->
  </div><!-- /.container -->
</div><!-- /.navbar -->
>>>>>>> 1.0-wip
