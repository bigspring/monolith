<div class="childpages childpages-grid">
	<div class="row">
    	<?php while ( $childpages->have_posts() ) : $childpages->the_post(); ?>    
            <div class="<?= CHILD_GRID_SIZE ?>">
	            <div id="childpage-item-<?= get_the_id() ?>" class="thumbnail">
	                <a class="thumbnail-link" href="<?= get_permalink(get_the_id()) ?>">
	                <?= get_the_post_thumbnail(get_the_ID()); ?>
	                </a>
	                <div class="caption">
	                <h4><?= get_the_title() ?></h4>
	                <a href="<?= get_permalink(get_the_id()) ?>">Read More &rarr;</a>
	                </div>
	            </div>
            </div>
		<? endwhile; ?>
	</div>
</div>