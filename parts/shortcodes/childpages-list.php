<ul class="unstyled childpages childpages-list">
    <?php while ( $childpages->have_posts() ) : $childpages->the_post(); ?>
        <li><a href=" <?= get_permalink(get_the_id()) ?>"><?= get_the_title() ?></a></li>
    <? endwhile; ?>
</ul>