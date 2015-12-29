<?php
/**
 * The tabs organism
 *
 * @package monolith
 */
?>

<?php if ( $loop->have_posts() ) : // if we have a loop load the tabs organism ?>
  <?php $count = 0; // initiate the count ?>
  <div class="monolith-tabs <?= $args['classes'] ?>">
    <!-- start tab layout wrapper -->
    <dl class="tabs" data-tab>
      <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <dd <?= $count === 0 ? 'class="active"' : '' ?>><a href="#panel-<?= get_the_id() ?>"><?php the_title(); ?></a>
        </dd>
        <?php $count ++ ?>
      <?php endwhile; ?>
    </dl>
    <!-- end tab layout wrapper -->

    <?php $count = 0; // reset the count  ?>

    <!-- start tab content part -->
    <div class="tabs-content">
      <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>
        <div class="content <?= $count === 0 ? 'active' : '' ?>" id="panel-<?= get_the_id() ?>">
          <?php the_content(); ?>
        </div>
        <?php $count ++ ?>
      <?php endwhile; ?>
    </div>
    <!-- end tab content part -->
  </div>

<?php else : // otherwise load the content-none molecule ?>
  <?php include( $layouts_path . 'organisms/content-none.php' ); ?>
<?php endif; ?>