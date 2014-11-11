<?php get_header(); ?>


<?php
	$stickies = get_option( 'sticky_posts' );
	$count_stickies = count( $stickies );
	if($count_stickies > 0) :

		query_posts(array(
			'posts_per_page' => 5,
			'post__in'  => $stickies
		));
?>
<div id="home-nav">

	<div class="featured-section">
		<?php get_template_part('loop', 'carousel'); ?>
	</div>

	<div id="square-widget-index" class="square-widget add_artwork">
		<?php dynamic_sidebar('yellow-square'); ?>
	</div>
</div>
<?php
		wp_reset_query();
	endif;
?>

<?php jeo_featured(); ?>

<?php

	wp_reset_query();

	$taxonomy = 'category';
	$term_args = array(
		'orderby' => 'name',
		'order' => 'ASC',
	);
	$category_list = get_terms($taxonomy, $term_args);
	$category_count = 0;
	foreach ($category_list as $category) {
		if ($category->count == 0) {
			unset($category_list[$count]);
		} 
		$count++;
	}
	$category_list = array_values($category_list);


if (count($category_list) > 2) :
	$numbers = range(0, count($category_list)-1);
	shuffle($numbers);

?>
	<section id="content">
<?php
	if($category_list[$numbers[0]]) :	
		wp_reset_query();
		query_posts(array(
			'posts_per_page' => 4,
			'cat' => $category_list[$numbers[0]]->cat_ID,
			'ignore_sticky_posts' => true
		));
?>

	<div class="child-section">
		<?php get_template_part('loop'); ?>
	</div>

<?php

	endif;

	if($category_list[$numbers[1]]) :
		wp_reset_query();
		query_posts(array(
			'posts_per_page' => 4,
			'cat' => $category_list[$numbers[1]]->cat_ID,
			'ignore_sticky_posts' => true
		));
?>

	<div class="child-section">
		<?php get_template_part('loop'); ?>
	</div>

<?php

	endif;

	if($category_list[$numbers[2]]) :
		wp_reset_query();
		query_posts(array(
			'posts_per_page' => 4,
			'cat' => $category_list[$numbers[2]]->cat_ID,
			'ignore_sticky_posts' => true
		));
?>

	<div class="child-section">
		<?php get_template_part('loop'); ?>
	</div>

<?php
	endif;
else:
?>
	<section id="content" class="scrolled">
		<div class="child-section">
			<?php get_template_part('loop2'); ?>
		</div>
<?php
endif;
?>


</section>

<?php 
wp_reset_query();

get_footer(); ?>