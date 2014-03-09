<?php /*
Template Name: Home
*/

get_header();
get_template_part('parts/welcome'); ?>

<div id="skyline"></div>
<video id="intro" src="<?php echo get_template_directory_uri(); ?>/video/volvo.mp4" autoplay></video>

<section id="main-wrapper">
	<div class="container" id="main-content">
		<div class="columns">
			<aside class="third second">
				<?php get_template_part('parts/gigs'); ?>
			</aside>
			
			<main class="two-thirds first" id="news">
				<?php get_template_part('parts/news'); ?>
			</main>
		</div>
	</div>
	
	<div class="clear"></div>
	<?php get_template_part('parts/releases'); ?>
	
	<div class="container">
		<div class="columns">
			<article class="two-thirds exclude-mobile">
				<?php get_template_part('parts/videos'); ?>
			</article>
			
			<div class="third">
				<?php get_sidebar(); ?>
			</div>
		</div>
	</div>
</section>

<?php get_footer();