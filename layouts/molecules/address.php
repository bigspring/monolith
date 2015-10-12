<?php
$address['details'] = isset( $address['details'] ) ? $address['details'] : get_address();
$address['class']   = isset( $address['class'] ) ? $address['class'] : '';
?>
<ul class="no-bullet address-list <?= $address['class'] ?>">
  <?php foreach ( $address['details'] as $detail ) : ?>
    <li><?= $detail ?></li>
  <?php endforeach; ?>
</ul>
