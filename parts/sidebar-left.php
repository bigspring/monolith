<? if(ENABLE_LEFT_SIDEBAR) { // if we enabled the right sidebar, render it ?>
	<aside class="sidebar-left span<?= SIDEBAR_LEFT_SIZE?>" role="complementary">
		<?php dynamic_sidebar('sidebar-left'); ?>
	</aside>
<? } ?>