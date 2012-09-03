<? if(ENABLE_RIGHT_SIDEBAR) { // if we enabled the right sidebar, render it ?>
	<aside id="sidebar-right" class="span<?= SIDEBAR_RIGHT_SIZE?>">
		<?php dynamic_sidebar('sidebar-right'); ?>
	</aside> 
<? } ?>