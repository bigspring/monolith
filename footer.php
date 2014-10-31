	</main>
	<!-- end block-main -->

	<!-- start the footer -->
	<footer class="block-footer" role="contentinfo">
		<hr/>
		<div class="row">
	    <div class="medium-8 columns">

				<!-- start the footer menu -->
				<ul class="inline-list footer-list">
				  <li>&copy; <?= date('Y'); ?> <?php bloginfo('name'); ?></li>

					<?php // @TODO footer nav goes here ?>
					<li><a href="#">Link 2</a></li>
				  <li><a href="#">Link 3</a></li>
				  <li><a href="#">Link 4</a></li>
				  <li><a href="#">Link 5</a></li>

				</ul>
				<!-- end the footer menu -->

<a class="webicon facebook small" href="#">Facebook</a>

			</div><!-- /.columns -->

			<div class="medium-4 columns">
				<?php get_template_part('layouts/molecules/social-media-icons'); // load the social media icons ?>
			</div><!-- /.columns -->
		</div><!-- /.row -->
	</footer>
	<!-- end the footer -->

</body>
</html>