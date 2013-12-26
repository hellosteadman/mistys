<?php while(have_posts()) {
	the_post(); ?>
	<article <?php post_class(); ?>>
		<header>
			<h1 class="post-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
				<small>Posted <?php the_time('jS F Y'); ?> by <?php the_author(); ?></small>
			</h1>
		</header>
		
		<main>
			<?php the_content(); ?>
		</main>
	</article>
<?php } ?>