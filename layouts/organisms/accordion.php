<?php
/**
 * The accordion organism  
 *
 * @package monolith
 */
?>

<?php if($loop->have_posts()) : // if we have a loop load the accordion molecule ?>
<?php $count = 0; // reset the count that we use for the number of items in the grid ?>

<!-- start accordion layout wrapper -->
<dl data-accordion="" class="accordion">
<?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
    <?php include($layouts_path . 'molecules/accordion-item.php'); ?>
    <?php $count++ ?>
<?php endwhile; ?>
</dl>
<!-- end accordion layout wrapper -->

<?php else : // otherwise load the content-none molecule ?>
    <?php include($layouts_path . 'organisms/content-none.php'); ?>
<?php endif; ?>