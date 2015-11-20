<?php $count = 1; ?>
<?php if ( $loop->have_posts() ) : ?>
  <div class="monolith-panels <?= $args['classes'] ?>">
    <?php while ( $loop->have_posts() ) : $loop->the_post(); ?>

      <?php include( $layouts_path . 'molecules/panel.php' ); ?>
      <?php $count ++; ?>
    <?php endwhile; ?>
  </div>
<?php else : ?>
  <?php include( $layouts_path . 'organisms/content-none.php' ); ?>
<?php endif; ?>