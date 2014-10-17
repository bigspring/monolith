<?php $count = 1; ?>
<?php if($loop->have_posts()) : ?>
<div class="snippets">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <?php include($layouts_path . 'molecules/snippet.php'); ?>
        <?php $count++ ; ?>
    <?php endwhile; ?>
</div>
<?php else : ?>
    <?php include($layouts_path . 'organisms/content-none.php'); ?>
<?php endif; ?>