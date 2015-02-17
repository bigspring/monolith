<?php
/**
 * Breadcrumbs layout, currently only supports NavXT (https://wordpress.org/plugins/breadcrumb-navxt/)
 *
 * @package monolith
 */
?>

<nav class="block-breadcrumbs">
  <div class="row">
    <div class="columns small-12">
      <ul class="breadcrumbs">
          <?php if(function_exists('bcn_display'))
          {
              bcn_display_list();
          }?>
      </ul>        
    </div><!-- /.columns -->
  </div><!-- /.row -->
</nav><!-- /.block-breadcrumbs -->

