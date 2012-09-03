<? if(ENABLE_LEFT_SIDEBAR) { // if we enabled the right sidebar, render it ?>
	<aside id="sidebar-left" class="span<?= SIDEBAR_LEFT_SIZE?>">
		<?php dynamic_sidebar('sidebar-left'); ?>
	</aside>
<? } ?>