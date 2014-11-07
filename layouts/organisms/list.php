<?php
/**
 * The list organism that calls in the list-item molecule
 *
 * @package monolith
 */
?>
<?php if($loop->have_posts()) : // if we have results run the loop  ?>
<div class="<?= $args['classes'] ?>">
<!-- start ul wrapper -->
    <ul class="">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <?php include($layouts_path . 'molecules/list-item.php'); ?>
    <?php endwhile; ?>
    </ul>
</div>
<!-- end ul wrapper -->

<?php else : // otherwise show the content none organism ?>
    <?php include($layouts_path . 'organisms/content-none.php'); ?>
<?php endif; ?>