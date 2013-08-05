<ul class="thumbnails">
    <?php while ( $childpages->have_posts() ) : $childpages->the_post(); ?>    
        <div id="childpage-item-<?= $childpage->ID ?>">
            <li class="col-2">
                <?= get_the_post_thumbnail(get_the_ID()); ?>
                <h3><?= get_the_title() ?></h3>
                <a href="<?= get_permalink($childpage->ID) ?>  class="btn">More</a>
            </li>
        </div>
    <? endwhile; ?>
</ul>