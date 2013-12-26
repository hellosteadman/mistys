<section id="releases">
	<div class="container">
		<h1>Releases</h1>
	</div>
	
	<div class="carousel-container">
		<div class="carousel">
			<?php skt_query('release');
			$first = true;
			$last = '';
			
			while(have_posts()) {
				the_post();
				
				$text = '<a href="' . get_permalink() . '" class="release" style="background: url(\'' . skt_get_thumbnail(300, 300) . '\');"></a>';
				if($first) {
					$first = false;
					$text = '<a href="/releases/" class="release all">' . $text;
				}
				
				echo $text;
			}
			
			wp_reset_query(); ?>
		</div>
	</div>
</section>