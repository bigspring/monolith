<?php
/**
 * Breadcrumbs layout, currently only supports NavXT (https://wordpress.org/plugins/breadcrumb-navxt/)
 *
 * @package monolith
 */
?>

<?php if ( function_exists( 'bcn_display' ) && ! is_front_page() ) : // load the bradcrumbs, except on the front page ?>

  <nav class="block-breadcrumbs">
    <div class="row">
      <div class="columns small-12">
        <ul class="breadcrumbs">
          <?php bcn_display_list(); ?>
        </ul>
      </div>
      <!-- /.columns -->
    </div>
    <!-- /.row -->
  </nav><!-- /.block-breadcrumbs -->

<?php endif; ?>