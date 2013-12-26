<?php $title = explode(' ', get_bloginfo('title')); ?>

<header id="welcome">
	<div class="container">
		<h1>
			<?php foreach($title as $word) { ?>
				<span><?php echo $word; ?></span>
			<?php } ?>
		</h1>
		
		<?php echo wpautop(get_bloginfo('description')); ?>
		<div class="clear"></div>
	</div>
</header>