<?php get_header(); ?>

<section id="content">
<?php if(have_posts()) : ?>
	<section class="posts-list texts-list">
		<?php while(have_posts()) : the_post(); ?>
			<article id="post-<?php the_ID(); ?>">
				<div class="clearfix">
					<?php if(has_post_thumbnail()) : ?>
						<div class="thumbnail-container">
							<a href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_post_thumbnail('page-featured'); ?></a>
						</div>
					<?php endif; ?>
					<header class="post-header">
						<div class="post-header-container">
							<?php if (!is_category()) : ?>
								<p class="categories"><?php echo get_the_category_list(', '); ?></p>
							<?php endif; ?>
							<h3><a class="<?php $categories = get_the_category(); echo category_color($categories[0]->term_id, 'color'); ?>" href="<?php the_permalink(); ?>" title="<?php the_title(); ?>"><?php the_title(); ?></a></h3>
							<div class="excerpt">
								<?php the_excerpt(); ?>
							</div>
						</div>
					</header>
				</div>
			</article>
		<?php endwhile; ?>
	</section>
<?php else: ?>
	<p><?php _e('Sorry, but no posts were found.', 'arteforadomuseu'); ?></p>
<?php endif; ?>
</section>

<?php get_footer(); ?>