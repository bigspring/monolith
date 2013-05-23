<? if(ENABLE_RIGHT_SIDEBAR) { // if we enabled the right sidebar, render it ?>
	<aside class="sidebar-right span<?= SIDEBAR_RIGHT_SIZE?>" role="complementary">
		<?php dynamic_sidebar('sidebar-right'); ?>
	</aside> 
<? } ?>