<?php if(have_posts()) : ?>
	<section class="posts-section">
		<ul class="posts-list popular bxslider">
			<?php while(have_posts()) : the_post(); ?>
				<?php if(!has_post_thumbnail()) continue; ?>
				<li id="post-<?php the_ID(); ?>">
					<article id="post-<?php the_ID(); ?>" class="<?php $categories = get_the_category(); echo category_color($categories[0]->term_id); ?>">
						<div class="thumbnail-container">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('featured-rectangle'); ?></a>
						</div>
						<header class="post-header <?php $categories = get_the_category(); echo category_color($categories[0]->term_id); ?>">
							<div class="post-header-container">
								<p class="categories"><?php echo get_the_category_list(', '); ?></p>
								<h3><a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
								<div class="excerpt">
									<?php the_excerpt(); ?>
								</div>
							</div>
						</header>
					</article>
				</li>
			<?php endwhile; ?>
		</ul>
	</section>
<?php endif; ?>