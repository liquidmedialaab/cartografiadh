<?php get_header(); ?>

<?php jeo_featured(); ?>

<section id="content" class="<?php $categories = get_the_category(); echo category_color($categories[0]->term_id); ?>">

	<?php do_action('afdm_before_content'); ?>

	<?php if(!is_paged()) get_template_part('content', 'popular'); ?>

	<div class="child-section">
		<div class="section-title">
			<p class="categories"><?php echo get_the_category_list(', '); ?></p>
		</div>
		<?php get_template_part('loop2'); ?>
	</div>
</section>

<?php get_footer(); ?>