<?php /*
Template Name: Internet Explorer 9
*/

?><!DOCTYPE html>
<html lang="en" class="no-js">
	<head>
		<meta charset="utf-8" />
		<link href="http://fonts.googleapis.com/css?family=Oxygen:400,300,700&amp;subset=latin,latin-ext" rel="stylesheet" />
		
		<?php wp_head(); ?>
		<style>
			body {
				font-family: 'Oxygen', sans-serif;
				font-weight: 300;
			}
			
			h1 {
				font-weight: 300;
				margin: 0;
				padding: 0;
			}
			
			.page {
				width: 600px;
				background: #eee;
				padding: 20px;
				margin: 100px auto;
			}
			
			a img { border-width: 0; }
			
			a.btn {
				background: #900;
				color: #fff;
				padding: 10px;
				display: block;
				text-align: center;
				text-decoration: none;
			}
			
			a.btn:hover {
				background: #600;
			}
		</style>
	</head>
	
	<body>
		<div class="page">
			<?php while(have_posts()) {
				the_post(); ?>
				
				<h1>
					<?php bloginfo('title'); ?>
					<small><?php the_title(); ?></small>
				</h1>
				
				<?php the_content(); ?>
				
				<div class="columns">
					<div class="two-thirds">
						<?php skt_query('gig', array('post_status' => 'future', 'posts_per_page' => 1));
						
						if(have_posts()) { ?>
							<section class="loop">
								<?php while(have_posts()) {
									the_post();
									$venues = wp_get_post_terms(get_the_ID(), 'gig_venue');
									$thumbnail = skt_get_thumbnail(96, 96); ?>
									<article <?php post_class(); ?>>
										<header class="<?php echo $thumbnail ? 'has-thumbnail' : 'no-thumbnail'; ?>">
											<?php if($thumbnail) { ?>
												<a href="<?php the_permalink(); ?>"><img class="thumbnail" src="<?php echo $thumbnail; ?>" /></a>
											<?php } ?>
											
											<h2 class="post-title">
												<?php if(skt_has_field('tickets_url')) { ?>
													<a class="btn" href="<?php skt_the_field('tickets_url'); ?>" target="_blank">Book now</a>
												<?php } ?>
												
												<strong><?php the_title(); ?></strong>
												<?php foreach($venues as $venue) {
													echo '@ ' . $venue->name;
												} ?>
												
												<small><?php the_time('jS F Y @ H:i'); ?></small>
											</h2>

											<div class="clear"></div>
										</header>
										
										<?php foreach($venues as $venue) {
											$address = mistys_get_venue_address($venue); ?>
											<a href="https://www.google.co.uk/maps/preview#!q=<?php echo urlencode($address); ?>" target="_blank" title="<?php echo esc_attr($address); ?>">
												<img class="map exclude-mobile" src="http://maps.googleapis.com/maps/api/staticmap?size=600x90&amp;markers=<?php echo urlencode($address); ?>&amp;zoom=16&amp;sensor=false" width="600" />
											</a>
										<?php } ?>
									</article>
								<?php } ?>
							</section>
						<?php }
						
						wp_reset_query(); ?>
						
						<a class="btn" href="http://mistysbigadventure.bandcamp.com/">Find us on Bandcamp</a>
					</div>
				</div>
			<?php } ?>
		</div>
		
		<?php wp_footer(); ?>
	</body>
</html>