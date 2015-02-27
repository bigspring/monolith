<?php
/**
 * Social media icons, based on theme options
 *
 * @package monolith
 */
?>

<!-- start social media icon list -->
<ul class="inline-list right social-icons">
	
	<?php if(get_option('monolith_facebook')) { ?>
	  <li>
	  	<a class="webicon facebook" href="<?= get_option('monolith_facebook'); ?>">Facebook</a>
	  </li>
	<? } ?>

	<?php if(get_option('monolith_googleplus')) { ?>
	  <li>
	  	<a class="webicon google" href="<?= get_option('monolith_googleplus'); ?>">Google</a>
	  </li>
	<? } ?>

	<?php if(get_option('monolith_instagram')) { ?>
	  <li>
	  	<a class="webicon instagram" href="<?= get_option('monolith_instagram'); ?>">Instagram</a>
	  </li>
	<? } ?>

	<?php if(get_option('monolith_linkedin')) { ?>
	  <li>
	  	<a class="webicon linkedin" href="<?= get_option('monolith_linkedin'); ?>">Linkedin</a>
	  </li>
	<? } ?>

	<?php if(get_option('monolith_twitter')) { ?>
	  <li>
	  	<a class="webicon twitter" href="<?= get_option('monolith_twitter'); ?>">Twitter</a>
	  </li>
	<? } ?>

	<?php if(get_option('monolith_youtube')) { ?>
	  <li>
	  	<a class="webicon youtube" href="<?= get_option('monolith_youtube'); ?>">YouTube</a>
	  </li>
	<? } ?>

</ul>
<!-- end social media icon list -->

