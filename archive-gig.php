<?php get_header(); ?>		
		<section id="main-wrapper">
			<div class="container">
				<h1>See Misty&rsquo;s live</h1>
				
				<div class="columns">
					<div class="two-thirds">
						<?php skt_query('gig', array('post_status' => 'future'));
						get_template_part('parts/loop', 'gig'); ?>
					</div>
					
					<div class="third">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</section>
<?php get_footer();