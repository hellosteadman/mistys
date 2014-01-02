<?php if(have_posts()) { ?>
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
						<img class="map exclude-mobile" src="http://maps.googleapis.com/maps/api/staticmap?size=644x90&amp;markers=<?php echo urlencode($address); ?>&amp;zoom=16&amp;sensor=false" width="644" />
						<img class="map mobile-only" src="http://maps.googleapis.com/maps/api/staticmap?size=320x90&amp;markers=<?php echo urlencode($address); ?>&amp;zoom=16&amp;sensor=false" width="320" />
					</a>
				<?php } ?>
			</article>
		<?php } ?>
	</section>
<?php } else { ?>
	<p>No upcoming gigs at the moment, sorry.</p>
<?php }