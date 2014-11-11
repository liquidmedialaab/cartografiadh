<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>

<?php jeo_featured(true, true); ?>

<section id="content" class="<?php $categories = get_the_category(); echo category_color($categories[0]->term_id); ?>">

	<?php do_action('afdm_before_content'); ?>

	<?php if(!is_paged()) get_template_part('content', 'popular'); ?>

	<div class="child-section">
		<header class="single-post-header clearfix <?php $categories = get_the_category(); echo category_color($categories[0]->term_id); ?>">
			<div class="single-post-header-container">
				<h1><?php the_title(); ?></h1>
				<div class="header-meta">
					<span class="lsf">&#xE137;</span> <?php _e('by', 'arteforadomuseu'); ?> <a href="<?php echo afdm_get_user_artguides_link(get_the_author_meta('ID')); ?>"><?php the_author(); ?></a>
					<br /><span class="lsf">&#xE13a;</span> <?php echo sprintf(_n('1 view', '%s views', afdm_get_views(), 'arteforadomuseu'), afdm_get_views()); ?>
					<br /><span class="lsf">&#xE12b;</span> <?php _e('added', 'arteforadomuseu'); ?> <?php echo get_the_date(); ?>
					<br /><span class="lsf">&#xE02b;</span> <?php echo sprintf(_n('1 artwork', '%s artworks', afdm_get_artguide_artwork_count(), 'arteforadomuseu'), afdm_get_artguide_artwork_count()); ?>
				</div>
			</div>
		</header>
		<section class="post-content-box">
			<?php the_content(); ?>

		<div class="buttons clearfix">
			<?php afdm_get_artguide_delete_button(); ?>
		</div>
		</section>

		<?php query_posts(afdm_get_artguide_query()); ?>
			<?php get_template_part('loop2'); ?>

		<?php wp_reset_query(); ?>
	</div>
</section>

<?php endif; ?>

<?php get_footer(); ?>
