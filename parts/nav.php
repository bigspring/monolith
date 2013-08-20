<nav class="navbar navbar-default" role="nagivation">
  <div class="container">

    <!-- .navbar-toggle is used as the toggle for collapsed navbar content -->
    <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".main-navigation">
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
      <span class="icon-bar"></span>
    </button>

    <? // the brand ?>
    <a class="navbar-brand" href="<?= home_url(); ?>"><?= bloginfo('title') ?> </a>

    <? // Place everything within .navbar-collapse to hide it until above 768px ?>
    <div class="collapse navbar-collapse main-navigation">

		<?php
			$args = array(
				'theme_location' => 'top-bar',
				'depth'		 => 2,
				'menu_class'	 => 'nav navbar-nav pull-right',
				'walker'	 => new Monolith_Nav_Walker()
			);
		
			wp_nav_menu($args);
		?>

    </div><!-- /.nav-collapse -->
  </div><!-- /.container -->
</nav><!-- /.navbar -->