<?php get_header(); ?>		
		<section id="main-wrapper">
			<div class="container">
				<div class="columns">
					<div class="two-thirds">
						<?php global $content_width; $content_width = 604; ?>
						<?php get_template_part('parts/single', get_post_type()); ?>
					</div>
					
					<div class="third">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</section>
<?php get_footer(); ?>