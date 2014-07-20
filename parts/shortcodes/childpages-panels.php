<?php // childpages panel view ?>

<section class="childpages childpages-panel">
	<?php while ( $childpages->have_posts() ) : $childpages->the_post(); // start the loop ?>

	<div class="panel panel-default">
	  <div class="panel-heading">
	    <h3 class="panel-title"><?= get_the_title() ?></h3>
	  </div>
		<div class="panel-body">
	  	<?php the_excerpt() ?>
		</div>
	  <div class="panel-footer">
			<a href=" <?= get_permalink(get_the_id()) ?>">Read More &rarr;</a>
		</div>
	</div>

	<? endwhile; // end the loop ?>
</section>
