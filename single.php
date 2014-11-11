<?php get_header(); ?>

<?php if(have_posts()) : the_post(); ?>

	<?php
	$links = afdm_get_links();
	$videos = afdm_get_videos();
	$images = afdm_get_artwork_images();
	$featured_video_id = afdm_get_featured_video_id();
	$address = get_post_meta( $post->ID, 'geocode_address', true ); 
	?>


	<article id="content" class="<?php $categories = get_the_category(); echo category_color($categories[0]->term_id, 'bg2'); ?>">
	<?php jeo_map(); ?>
		<nav class="related-posts">
			<h5><span class="lsf">&#xE103;</span><?php _e('Related points', 'arteforadomuseu'); ?></h5>
			<?php 
				$post_id = get_the_ID();
				$related_posts = get_posts(array(
					'category_name' => $categories[0]->slug,
					'post_per_page' => 5,
					'post__not_in' => array($post_id)
				));
			if($related_posts) : ?>
				<section class="posts-section">
					<ul class="posts-list bxslider">
						<?php 
							foreach($related_posts as $related_post) :
								$related_post_ID = $related_post->ID;
						?>
							<li id="post-<?php echo $related_post_ID; ?>">
								<article id="post-<?php echo $related_post_ID; ?>" class="<?php $categories = get_the_category(); echo category_color($categories[0]->term_id); ?>">
									<div class="clearfix">
										<?php if(has_post_thumbnail($related_post_ID)) : ?>
											<div class="thumbnail-container">
												<a href="<?php echo get_permalink($related_post_ID); ?>" title="<?php echo get_the_title($related_post_ID); ?>"><?php echo get_the_post_thumbnail($related_post_ID, 'page-featured'); ?></a>
											</div>
										<?php endif; ?>
										<header class="post-header <?php $categories = get_the_category(); echo category_color($categories[0]->term_id); ?>">
											<div class="post-header-container">
												<h3><a href="<?php echo get_permalink($related_post_ID); ?>" title="<?php echo get_the_title($related_post_ID); ?>"><?php echo get_the_title($related_post_ID); ?></a></h3>
												<div class="excerpt">
													<?php echo $related_post->post_excerpt; ?>
												</div>
											</div>
										</header>
									</div>
								</article>
							</li>
						<?php endforeach; ?>
					</ul>
				</section>
			<?php else: ?>
				<p><?php _e('Sorry, but no posts were found.', 'arteforadomuseu'); ?></p>
			<?php endif; ?>
		</nav>

		<div class="single-post">
			<header class="single-post-header clearfix <?php $categories = get_the_category(); echo category_color($categories[0]->term_id); ?>">
				<div class="single-post-header-img">
					<?php the_post_thumbnail('page-featured'); ?>
				</div>
				<div class="single-post-header-container">
					<?php echo get_the_category_list(); ?>
					<h1><?php the_title(); ?></h1>
					<div class="header-meta">
						<?php if($address) : ?>
							<p class="address">
								<?php echo $address; ?>
							</p>
						<?php endif; ?>
						<p><?php the_author(); ?></p>
					</div>
				</div>
			</header>

			<div class="post-content <?php $categories = get_the_category(); echo category_color($categories[0]->term_id); ?>">
				<section class="post-content-box">
					<?php afdm_artguides_artwork_button($get_the_ID); ?>
					<h5><span class="lsf">&#xE10b;</span><?php _e('Testimonial', 'arteforadomuseu'); ?></h5>
					<?php the_content(); ?>
				</section>

			</div>
			<div class="middle-content">
				<section class="post-content-box">
					<?php if($images || $videos) :?>
						<h5><span class="lsf">&#xE101;</span><?php _e('Gallery', 'arteforadomuseu'); ?></h5>
					<?php endif; ?>

					<?php if($videos) : ?>
						<section id="videos" class="content-box">
							<ul class="video-list clearfix">
								<?php foreach($videos as $video) : ?>
									<li>
										<a rel="shadowbox" href="<?php echo get_video($video['url'], 'url'); ?>?autoplay=1&rel=0">
											<span class="lsf">&#xE107;</span><img src="<?php echo get_video($video['url'], 'thumbnail'); ?>" />
										</a>
									</li>
								<?php endforeach; ?>
							</ul>
						</section>
					<?php endif; ?>
					<?php if($images) : ?>
						<section id="images" class="content-box">
							<div class="image-gallery">
								<div class="image-list-container clearfix">
									<ul class="image-list">
										<?php foreach($images as $image) : ?>
											<li>
												<a href="<?php echo $image['large'][0]; ?>" title="<?php echo $image['caption']; ?>" rel="shadowbox['gallery']"><img src="<?php echo $image['thumb'][0]; ?>" /></a>
											</li>
										<?php endforeach; ?>
									</ul>
								</div>
							</div>
						</section>
					<?php endif; ?>
				</section>
				<?php if($links) : ?>
					<section class="post-content-box">
					<h5><span class="lsf">&#xE082;</span><?php _e('Links', 'arteforadomuseu'); ?></h5>
						<ul class="link-list clearfix">
							<?php foreach($links as $link) : ?>
								<li><a href="<?php echo $link['url'] ; ?>" rel="external" target="_blank" title="<?php echo $link['title']; ?>"><?php echo $link['title']; ?></a><br><?php echo mira_lang_array($link['description']); ?></li>
							<?php endforeach; ?>
						</ul>
					</section>
				<?php endif; ?>
			</div>
		</section>

	</article>

<?php endif; ?>

<?php get_footer(); ?>