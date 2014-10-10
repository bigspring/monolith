<?php if($loop->have_posts()) : ?>
<ul<?= $args['classes'] ?>>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <?php include($template_path . 'parts/builder/atoms/list-item.php'); ?>
<?php endwhile; ?>
</ul>
<?php else : ?>
    <?php include($template_path . 'parts/builder/organisms/content-none.php'); ?>
<?php endif; ?>