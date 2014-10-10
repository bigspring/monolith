<?php $count = 1; ?>
<?php if($loop->have_posts()) : ?>
<div class="snippet">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

        <?php include($template_path . 'parts/builder/organisms/snippet.php'); ?>
        <?php $count++ ; ?>
    <?php endwhile; ?>
</div>
<?php else : ?>
    <?php include($template_path . 'parts/builder/organisms/content-none.php'); ?>
<?php endif; ?>