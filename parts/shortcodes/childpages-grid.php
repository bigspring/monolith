<div class="childpages childpages-grid">
	<div class="row">
    	<?php while ( $childpages->have_posts() ) : $childpages->the_post(); ?>    
            <div class="col-4">
	            <div id="childpage-item-<?= get_the_id() ?>">
	                <?= get_the_post_thumbnail(get_the_ID()); ?>
	                <h3><?= get_the_title() ?></h3>
	                <a href="<?= get_permalink(get_the_id()) ?>"  class="btn">More</a>
	            </div>
            </div>
		<? endwhile; ?>
	</div>
</div>