<?php if(have_posts()) { ?>
	<section class="loop">
		<?php while(have_posts()) {
			the_post(); ?>
			<article <?php post_class(); ?>>
				<header>
					<h2 class="post-title">
						<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
						<small><?php the_time('jS F Y'); ?></small>
					</h2>
				</header>
				
				<main>
					<?php the_content('Read more...'); ?>
				</main>
			</article>
		<?php } ?>
	</section>
<?php } else { ?>
	<p>Sorry, no posts can be found.</p>
<?php }