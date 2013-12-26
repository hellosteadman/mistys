<?php if(have_posts()) { ?>
	<section class="loop">
		<?php while(have_posts()) {
			the_post();
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
						<small><?php the_time('jS F Y @ H:i'); ?></small>
					</h2>
					
					<div class="clear"></div>
				</header>
			</article>
		<?php } ?>
	</section>
<?php } else { ?>
	<p>No upcoming gigs at the moment, sorry.</p>
<?php }