<ul class="address-list <?= $type; ?>">
	<?php if(get_option('monolith_address_1')) : ?>
		<li><?= get_option('monolith_address_1'); ?></li>	
	<?php endif; ?>
	<?php if(get_option('monolith_address_2')) : ?>
		<li><?= get_option('monolith_address_2'); ?></li>	
	<?php endif; ?>
	<?php if(get_option('monolith_address_3')) : ?>
		<li><?= get_option('monolith_address_3'); ?></li>	
	<?php endif; ?>
	<?php if(get_option('monolith_city')) : ?>
		<li><?= get_option('monolith_city'); ?></li>	
	<?php endif; ?>
	<?php if(get_option('monolith_county')) : ?>
		<li><?= get_option('monolith_county'); ?></li>	
	<?php endif; ?>
	<?php if(get_option('monolith_postcode')) : ?>
		<li><?= get_option('monolith_postcode'); ?></li>	
	<?php endif; ?>
	<?php if(get_option('monolith_country')) : ?>
		<li><?= get_option('monolith_country'); ?></li>	
	<?php endif; ?>
</ul>