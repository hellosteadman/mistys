<?php skt_query('gallery', array('posts_per_page' => 1));
while(have_posts()) {
	the_post(); ?>
	
	<h1>Gallery</h1>
	<div class="columns">
		<?php $attachments = get_children(
			array(
				'numberposts' => 3,
				'post_mime_type' => 'image',
				'post_parent' => get_the_ID(),
				'post_type' => 'attachment'
			)
		);
		
		foreach($attachments as $attachment) { ?>
			<div class="third">
				<a class="thumbnail" href="<?php the_permalink(); ?>">
					<img src="<?php echo skt_the_thumbnail(96, 96, $attachment->ID); ?>">
				</a>
			</div>
		<?php } ?>
	</div>
<?php }

wp_reset_query();