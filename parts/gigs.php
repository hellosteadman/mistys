<?php skt_query('gig',
	array(
		'post_status' => 'future',
		'posts_per_page' => 3
	)
);

if(have_posts()) { ?>
	<h1>Upcoming gigs</h1>
	<ul class="gigs">
		<?php while(have_posts()) {
			the_post(); ?>
			<li>
				<span><?php the_title(); ?></span>
				<span><?php the_time('jS M'); ?></span>
				<?php if(skt_has_field('tickets_url')) { ?>
					<a class="btn" href="<?php skt_the_field('tickets_url'); ?>" target="_blank">Book now</a>
				<?php } ?>
			</li>
		<?php } ?>
	</ul>
<?php }

wp_reset_query();