<?php while(have_posts()) {
	the_post(); ?>
	<article <?php post_class(); ?>>
		<header>
			<h1 class="post-title">
				<?php if(skt_has_field('tickets_url')) { ?>
					<a class="btn" href="<?php skt_the_field('tickets_url'); ?>" target="_blank">Book now</a>
				<?php } ?>
				
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h1>
		</header>
		
		<main>
			<?php the_content(); ?>
		</main>
	</article>
<?php } ?>