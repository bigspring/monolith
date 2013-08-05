<div class="childpages">

	<?php $count = 0; // reset the count ?>
	
	<ul class="nav nav-tabs" id="childpages-tabs">
		<?php while ( $childpages->have_posts() ) : $childpages->the_post(); ?>
		<li <?= $count == 0 ? 'class="active"' : '' ?>><a href="#tab-<?= get_the_id() ?>" data-toggle="tab"><?php the_title()?></a></li>
		<?php $count++ ?>
		<?php endwhile; ?>
		
	</ul>
	
	<?php $count = 0; // reset the count ?>
	
	<div class="tab-content">
	  <?php while ( $childpages->have_posts() ) : $childpages->the_post(); ?>
	  <div class="tab-pane <?= $count == 0 ? 'active' : '' ?>" id="tab-<?= get_the_id() ?>"><?php the_content() ?></div>
	  <?php $count++ ?>
	  <?php endwhile ?>
	</div>

</div>