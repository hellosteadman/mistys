<?php while(have_posts()) {
	the_post(); ?>
	<article <?php post_class(); ?>>
		<header>
			<h1 class="post-title">
				<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			</h1>
		</header>
		
		<main>
			<?php the_content(); ?>
		</main>
	</article>
<?php } ?>