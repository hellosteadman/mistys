		<section class="container">
			<footer>
				&copy; 2013 Misty&rsquo;s Big Adventure |
				Website by <a href="http://steadman.io">Steadman</a><?php wp_nav_menu(
					array(
						'theme_location' => 'mistys_additional',
						'container_class' => 'menu',
						'depth' => 1
					)
				); ?>
			</footer>
		</section>
		
		<div id="jquery_jplayer"></div>
		<?php wp_footer(); ?>
	</body>
</html>