<?php get_header(); ?>

<article id="content">
	<?php if(have_posts()) : the_post(); ?>
		<div class="text-post">
			<header class="single-post-header clearfix <?php $categories = get_the_category(); echo category_color($categories[0]->term_id); ?>">
				<div class="single-post-header-img">
					<?php the_post_thumbnail('page-featured'); ?>
				</div>
				<div class="single-post-header-container">
					<?php echo get_the_category_list(); ?>
					<h1><?php the_title(); ?></h1>
					<div class="header-meta">
						<!-- <p><?php the_author(); ?></p> -->
					</div>
				</div>
			</header>

			<div class="post-content">
				<section class="post-content-box">
					<?php the_content(); ?>
					<p>Autor: <?php the_author(); ?></p>
				</section>

			</div>
	<?php endif; ?>
</article>

<?php get_footer(); ?>