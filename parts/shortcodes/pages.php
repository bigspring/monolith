<div class="media">
<?php while ( $pages->have_posts() ) : $pages->the_post(); ?>
    <div id="childpage-item-<?= get_the_id() ?>">
        <div class="row">
            <div class="col-2">
                <a href="<?= get_permalink() ?>"><?= get_the_post_thumbnail($post->ID, 'thumbnail') ?></a>
            </div>
            <div class="col-10">
                <div class="media-body">
                    <a href="<?= get_permalink() ?>"><h3 class="media-heading"><?= get_the_title() ?></h3></a>
                    <?= get_the_excerpt() ?>
                </div>
            </div>
        </div>
    </div>
<? endwhile; ?>
</div> <? //end media div ?>           