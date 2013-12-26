<?php get_header(); ?>
		<section id="main-wrapper">
			<div class="container">
				<div class="columns">
					<div class="two-thirds">
						<header class="tab-container">
							<ul class="tabs">
								<?php $types = get_terms('release_type');
								foreach($types as $i => $type) { ?>
									<li<?php if($i == 0) { ?> class="active"<?php } ?>>
										<a class="btn" href="#<?php echo $type->slug; ?>"><?php echo $type->name; ?></a>
									</li>
								<?php } ?>
							</ul>
							
							<h1>Releases</h1>
						</header>
						
						<?php global $content_width; $content_width = 604;
						
						foreach($types as $i => $type) { ?>
							<div class="tab<?php if($i == 0) { echo ' active'; } ?>" id="<?php echo $type->slug; ?>">
								<?php skt_query('release',
									array(
										'release_type' => $type->slug,
										'posts_per_page' => -1
									)
								);
								
								get_template_part('parts/loop', get_post_type());
								wp_reset_query(); ?>
							</div>
						<?php } ?>
					</div>
					
					<div class="third">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</section>
<?php get_footer();