<?php
/**
 * Search Result Snippet
 *
 * @package monolith
 */
?>
<?php
$post_type = get_post_type();
$obj = get_post_type_object( $post_type );
?>

<!-- start single snippet -->
<article <?php post_class( 'snippet' ); ?>>

  <!-- entry title -->
  <header>
      <h3><a href="<?php the_permalink(); ?>"><?php the_title(); ?></a> <span class="label secondary"><?= $obj->labels->singular_name ?></span></h3>
      <a href="<?= get_permalink(); ?>" rel="bookmark"><?= get_permalink(); ?></a>
  </header>

  <?php if(has_excerpt()) : ?>
      <?= wp_trim_words( get_the_excerpt(), 35, '...' ); ?>
  <?php else : ?>
      <?= wp_trim_words( get_the_content(), 35, '...' ); ?>      
  <?php endif; ?>

</article>
<hr/>
<!-- end single snippet -->
