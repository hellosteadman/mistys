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
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<small>
							&pound;<?php skt_the_field('price'); ?><br />
							<?php echo $qty; ?> left in stock
						</small>
					</h2>
					
					<div class="clear"></div>
				</header>
				
				<main>
					<?php the_excerpt(); ?>
				</main>
			</article>
		<?php } ?>
	</section>
<?php } else { ?>
	<p>Sorry, no releases can be found.</p>
<?php }