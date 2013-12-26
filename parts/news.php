<h1>Latest news</h1>
<ul class="news">
	<?php query_posts('posts_per_page=3');
	while(have_posts()) {
		the_post(); ?>
		<li>
			<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
			<small>posted <?php echo mistys_timesince(); ?></small>
		</li>
	<?php } ?>
</ul>