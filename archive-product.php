<?php get_header(); ?>
		<section id="main-wrapper">
			<div class="container">
				<div class="columns">
					<div class="two-thirds">
						<header class="tab-container">
							<ul class="tabs">
								<?php $types = get_terms('product_type');
								$first = true;
								foreach($types as $i => $type) { ?>
									<li<?php if($first) { ?> class="active"<?php } ?>>
										<a class="btn" href="#<?php echo $type->slug; ?>"><?php echo $type->name; ?></a>
									</li>
								<?php $first = false;
								} ?>
							</ul>
							
							<h1>Merchandise</h1>
						</header>
						
						<?php global $content_width;
						$content_width = 604;
						$first = true;
						
						foreach($types as $i => $type) { ?>
							<div class="tab<?php if($first) { echo ' active'; } ?>" id="<?php echo $type->slug; ?>">
								<?php skt_query('product',
									array(
										'product_type' => $type->slug,
										'posts_per_page' => -1
									)
								);
								
								get_template_part('parts/loop', 'product');
								wp_reset_query();
								$first = false; ?>
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