<?php while(have_posts()) {
	the_post(); ?>
	<article <?php post_class(); ?>>
		<header class="<?php echo has_post_thumbnail() ? 'has-featured-image' : 'no-featured-image'; ?>"<?php if(has_post_thumbnail()) { ?> style="background-image: url('<?php skt_the_thumbnail(644, 362); ?>');"<?php } ?>>
			<div class="inner">
				<h1 class="post-title">
					<?php if(skt_has_field('buy_url')) { ?>
						<a class="btn" href="<?php skt_the_field('buy_url'); ?>" target="_blank">Buy it</a>
					<?php } ?>
				
					<a href="<?php the_permalink(); ?>"><?php the_title(); ?></a>
					<small>
						Released in <?php the_time('Y');
					
						$labels = wp_get_post_terms(get_the_ID(), 'release_label');
						if(count($labels)) {
							echo ' on ';
							foreach($labels as $label) {
								echo $label->name;
								break;
							}
						} ?>
					</small>
				</h1>
			</div>
		</header>
		
		<?php if($tracklist = skt_get_field('tracklist')) { ?>
			<ol class="tracklist">
				<?php foreach($tracklist as $i => $track) { ?>
					<li>
						<?php if($track['listen_url']) { ?>
							<a class="audio-preview" href="<?php echo $track['listen_url']; ?>"></a>
						<?php } ?>
						<span class="number"><?php echo $i + 1; ?></span>
						<span class="title">
							<?php echo htmlentities($track['title']);
							if($track['subtitle']) { ?>
								<small><?php echo htmlentities($track['subtitle']); ?></small>
							<?php } ?>
						</span>
					</li>
				<?php } ?>
			</ol>
		<?php }
		
		global $post;
		if($post->post_content) { ?>
			<main class="clear">
				<?php the_content(); ?>
			</main>
		<?php } ?>
	</article>
<?php }