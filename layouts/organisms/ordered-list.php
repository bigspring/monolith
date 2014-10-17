<?php if($loop->have_posts()) : ?>
    <ol<?= $args['classes'] ?>>
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php include($layouts_path . 'molecules/list-item.php'); ?>
        <?php endwhile; ?>
    </ol>
<?php else : ?>
    <?php include($layouts_path . 'organisms/content-none.php'); ?>
<?php endif; ?>