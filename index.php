<?php get_header(); ?>
		<section id="main-wrapper">
			<div class="container">
				<h1><?php
					if(is_day()) {
						echo 'Daily archives <small>' . get_the_date() . '</small>';
					} elseif(is_month()) {
						echo 'Monthly archives <small>' . get_the_date('F Y') . '</small>';
					} elseif(is_year()) {
						echo 'Yearly archives <small>' . get_the_date('Y') . '</small>';
					} else {
						$type = get_post_type_object(get_post_type());
						switch($type->name) {
							case 'post':
								echo 'Latest news';
								break;
							case 'gallery':
								echo 'Photos';
								break;
							default:
								echo $type->labels->name;
						}
					}
				?></h1>
				
				<div class="columns">
					<div class="two-thirds">
						<?php global $content_width; $content_width = 604; ?>
						<?php get_template_part('parts/loop', get_post_type()); ?>
					</div>
					
					<div class="third">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</section>
<?php get_footer(); ?>