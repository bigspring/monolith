<?php
/**
 * The block grid organism  
 *
 * @package monolith
 */
?>

<?php if($loop->have_posts()) : // if we have a loop load the block grid organism ?>

<!-- start the block grid ul -->
<ul<?= $args['classes'] ?>>
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <?php include($layouts_path . 'molecules/block-grid-item.php'); ?>
<?php endwhile; ?>
</ul>
<!-- end the block grid ul -->

<?php else : // otherwise load the content-none molecule ?>
    <?php include($layouts_path . 'organisms/content-none.php'); ?>
<?php endif; ?>