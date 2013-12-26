<?php get_header(); ?>		
		<section id="main-wrapper">
			<div class="container">
				<div class="columns">
					<div class="two-thirds">
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
					</div>
					
					<div class="third">
						<?php get_sidebar(); ?>
					</div>
				</div>
			</div>
		</section>
<?php get_footer(); ?>