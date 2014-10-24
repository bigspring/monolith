<?php if($loop->have_posts()) : ?>
<?php $count = 0; // reset the count ?>

<dl data-accordion="" class="accordion">
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <?php include($layouts_path . 'molecules/accordion-item.php'); ?>
    <?php $count++ ?>
<?php endwhile; ?>
</dl>

<?php else : ?>
    <?php include($layouts_path . 'organisms/content-none.php'); ?>
<?php endif; ?>