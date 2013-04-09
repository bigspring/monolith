<? // navbar part ?>
	  <? if(BOOTSTRAP_RESPONSIVE) { ?>
	  <a class="btn btn-navbar" data-toggle="collapse" data-target=".nav-collapse">
	  	Menu
	  </a>
	
	 <div class="nav-collapse collapse">
	 <? } // endo el responsivo check - only show responsive menu if el reponsive constantos is on ?>
	 
	<?php
		$args = array(
			'theme_location' => 'top-bar',
			'depth'		 => 2,
			/*'container'	 => false, */
			'menu_class'	 => 'nav nav-pills',
			'walker'	 => new Monolith_Nav_Walker()
		);
	
		wp_nav_menu($args);
	?>
<? if(BOOTSTRAP_RESPONSIVE) { ?>
	</div> <!-- /navbar-collape -->
 <? } // endo el responsivo check - close the collapse wrapper ?>
