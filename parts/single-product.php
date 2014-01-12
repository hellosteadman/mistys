<?php while(have_posts()) {
	the_post();
	$thumbnail = skt_get_thumbnail(96, 96); ?>
	<article <?php post_class(); ?>>
		<header class="<?php echo $thumbnail ? 'has-thumbnail' : 'no-thumbnail'; ?>">
			<?php if($thumbnail) { ?>
				<a class="exclude-mobile" href="<?php the_permalink(); ?>"><img class="thumbnail" src="<?php echo $thumbnail; ?>" /></a>
			<?php } ?>
			
			<h2 class="post-title">
				<?php $qty = skt_get_field('quantity');
				if($qty && intVal($qty) > 0) {
					echo do_shortcode('[wp_cart_button name="' . get_the_title() . '" price="' . skt_get_field('price') . '"]');
				} else { ?>
					<a class="btn" href="#">Sold out</a>
				<?php } ?>
				
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<small>
					&pound;<?php skt_the_field('price'); ?><br />
					<?php echo $qty; ?> left in stock
				</small>
			</h2>
			
			<div class="clear"></div>
		</header>
		
		<main>
			<?php if($thumbnail) { ?>
				<img src="<?php skt_the_thumbnail(624); ?>" />
			<?php }
			
			$qty = skt_get_field('quantity'); ?>
			<p><?php if($qty && intVal($qty) > 0) { ?>
				<a class="btn mobile-only" href="#">Buy now</a>
			<?php } else { ?>
				<a class="btn mobile-only" href="#">Sold out</a>
			<?php } ?></p>
			
			<?php the_excerpt(); ?>
		</main>
	</article>
<?php }