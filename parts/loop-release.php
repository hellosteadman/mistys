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
						<?php if(skt_has_field('buy_url')) { ?>
							<a class="btn" href="<?php skt_the_field('buy_url'); ?>" target="_blank">Buy it</a>
						<?php } ?>
						
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<small>
							<?php the_time('Y');
							$labels = wp_get_post_terms(get_the_ID(), 'release_label');
							if(count($labels)) {
								echo ', ';
								foreach($labels as $label) {
									echo $label->name;
									break;
								}
							} ?>
						</small>
					</h2>
					
					<div class="clear"></div>
				</header>
			</article>
		<?php } ?>
	</section>
<?php } else { ?>
	<p>Sorry, no releases can be found.</p>
<?php }