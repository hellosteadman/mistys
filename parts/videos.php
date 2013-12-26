<?php skt_query('video', array('posts_per_page' => 1));
global $content_width;

while(have_posts()) {
	the_post();
	$content_width = 624; ?>
	<h1>Latest video</h1>
	<?php the_content(); ?>
<?php } ?>