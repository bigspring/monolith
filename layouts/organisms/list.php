<?php if($loop->have_posts()) : ?>
<ul<?= $args['classes'] ?>>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <?php include($layouts_path . 'molecules/list-item.php'); ?>
<?php endwhile; ?>
</ul>

<?php var_dump($layouts_path) ?>
<?php else : ?>
    <?php include($layouts_path . 'organisms/content-none.php'); ?>
<?php endif; ?>