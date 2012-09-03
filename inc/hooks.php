<?php
// if the option for analytics ID is enabled in config.php, run the hook
if(GOOGLE_ANALYTICS_ID == true)
	add_action('wp_head', 'analytics_head');

// if the option for opengraph is enabled in config.php, run the hook
if(OPENGRAPH_HEAD == true)
	add_action('wp_head', 'opengraph_head');

/**
 * Google Analytics
 */
function analytics_head() { ?>
	<script type="text/javascript">
		var _gaq = _gaq || [];
		_gaq.push(['_setAccount', '<?= GOOGLE_ANALYTICS_ID ?>']);
		_gaq.push(['_trackPageview']);
		
		(function() {
			var ga = document.createElement('script'); ga.type = 'text/javascript'; ga.async = true;
			ga.src = ('https:' == document.location.protocol ? 'https://ssl' : 'http://www') + '.google-analytics.com/ga.js';
			var s = document.getElementsByTagName('script')[0]; s.parentNode.insertBefore(ga, s);
		})();
	</script>
<?php }

/**
 * Adds opengraph tags to the header
 */
function opengraph_head()
{
	if(is_single() || is_category() || is_page()) {
		global $post;
		$thumbsrc = home_url() . SITE_LOGO;
		if(has_post_thumbnail())
		{
			$thumbsrc = wp_get_attachment_image_src(get_post_thumbnail_id());
			$thumbsrc = $thumbsrc[0];
		}
		?>
			<meta property="og:title" content="<?= get_the_title() ?>"/>
			<meta property="og:type" content="article"/>
			<?php if(is_single()) : ?>
				<meta property="og:url" content="<?= get_permalink() ?>"/>
			<?php else : ?>
				<meta property="og:url" content="http://<?= $_SERVER["HTTP_HOST"] . $_SERVER["REQUEST_URI"] ?>"/>
			<?php endif; ?>	<meta property="og:image" content="<?= $thumbsrc ?>"/>
			<meta property="og:site_name" content="<?= bloginfo('name') ?>"/>
			<meta property="og:description" content="<?= $post->post_excerpt ?>"/>	
		    <meta property="fb:admins" content="<?= FACEBOOOK_ADMIN_ID ?>"/>
		<?php }
}