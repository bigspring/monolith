  <dd class="accordion-navigation <?= $count == 0 ? 'active' : '' ?>">
    <a href="#panel-<?= get_the_id() ?>"><?php the_title(); ?></a>
    <div class="content  <?= $count == 0 ? 'active' : '' ?>" id="panel-<?= get_the_id() ?>">
      <?php the_content(); ?>
    </div>
  </dd>
