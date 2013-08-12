<?php // childpages panel view ?>

<section class="childpages childpages-panel">
	<?php while ( $childpages->have_posts() ) : $childpages->the_post(); // start the loop ?>
	
	<div class="panel">
	  <div class="panel-heading">
	    <h3 class="panel-title"><?= get_the_title() ?></h3>
	  </div>
	  <?php the_excerpt() ?>
	  <a href=" <?= get_permalink(get_the_id()) ?>">Read More &rarr;</a>
	</div>
	
	<? endwhile; // end the loop ?>
</section>