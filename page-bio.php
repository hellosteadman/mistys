<?php /*
Template Name: Biography
*/

get_header(); ?>
		<section id="main-wrapper">
			<div class="container">
				<h1 class="post-title">
					<a href="<?php the_permalink(); ?>">We go the long way round</a>
				</h1>
			</div>
			
			<article class="mobile-only">
				<?php the_post(); ?>
				<div class="container">
					<?php the_content(); ?>
				</div>
			</article>
			
			<article class="exclude-mobile">
				<?php $lines = 0;
				$line = array();
				
				foreach(explode("\n", get_the_content() . "\n") as $l) {
					if($l && trim($l)) {
						if(trim($l) == '-') {
							$line[] = "\n";
						} else {
							$l = trim($l);
							
							if(substr($l, 0, 1) == "\n") {
								$l = substr($l, 1);
							}
							
							if(substr($l, 0, strlen($l) - 1) == "\n") {
								$l = substr($l, 0, strlen($l) - 1);
							}
							
							if(trim($l)) {
								$line[] = trim($l);
							}
						}
					} else {
						$lines += 1;
						echo '<div class="para para-' . $lines . '">';
						echo '<div class="container">';
						
						$l = implode("\n", $line);
						echo wpautop($l);
						echo '</div></div>';
						$line = array();
					}
				} ?>
			</article>
		</section>
<?php get_footer(); ?>