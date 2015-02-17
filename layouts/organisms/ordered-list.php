<?php
/**
 * The ordered list organism that calls in the list-item molecule
 *
 * @package monolith
 */
?>

<?php if($loop->have_posts()) : // if we have results run the loop  ?>

<!-- start ol wrapper -->
    <ol class="monolith-ordered-list <?= $args['classes'] ?>">
        <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
            <?php include($layouts_path . 'molecules/list-item.php'); ?>
        <?php endwhile; ?>
    </ol>
<!-- end ol wrapper -->    

<?php else : // otherwise show the content none organism ?>
    <?php include($layouts_path . 'organisms/content-none.php'); ?>
<?php endif; ?>