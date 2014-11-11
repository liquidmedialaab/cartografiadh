<!DOCTYPE html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo('charset'); ?>" />
<title><?php
	global $page, $paged;

	wp_title( '|', true, 'right' );

	bloginfo( 'name' );

	$site_description = get_bloginfo('description', 'display');
	if ( $site_description && ( is_home() || is_front_page() ) )
		echo " | $site_description";

	if ( $paged >= 2 || $page >= 2 )
		echo ' | Página ' . max($paged, $page);

	?></title>
<link rel="profile" href="http://gmpg.org/xfn/11" />
<link rel="pingback" href="<?php bloginfo('pingback_url'); ?>" />
<link rel="shortcut icon" href="<?php bloginfo('template_directory'); ?>/img/favicon.ico" type="image/x-icon" />
<meta name="viewport" content="width=device-width,initial-scale=1">
<?php wp_head(); ?>
</head>
<body <?php body_class(get_bloginfo('language')); ?>>
<div class="wrapper">
	<div id="fb-root"></div>
	<script>(function(d, s, id) {
	  var js, fjs = d.getElementsByTagName(s)[0];
	  if (d.getElementById(id)) return;
	  js = d.createElement(s); js.id = id;
	  js.src = "//connect.facebook.net/pt_BR/all.js#xfbml=1&appId=450923021667564";
	  fjs.parentNode.insertBefore(js, fjs);
	}(document, 'script', 'facebook-jssdk'));</script>
	<header id="masthead">
		<?php if ( get_theme_mod( 'bh_logo' ) ) : ?>
			<div class="logo">
				<a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>">
					<img src="<?php echo get_theme_mod( 'bh_logo' ); ?>" alt="<?php echo esc_attr( get_bloginfo( 'name', 'display' ) ); ?>" class="scale-with-grid" />
				</a>
			</div>
		<?php else : ?>
			<div class="site-meta">
				<h1>
					<a href="<?php echo home_url('/'); ?>" title="<?php bloginfo('name'); ?>">
						<?php bloginfo('name'); ?>
					</a>
				</h1>
			</div>
		<?php endif; ?>

		<div class="main-menu">
		<?php if(function_exists('qtrans_getLanguage')) : ?>
				<nav id="langnav">
					<ul>
						<?php
						global $q_config;
						if(is_404()) $url = get_option('home'); else $url = '';
						$current = qtrans_getLanguage();
						foreach($q_config['enabled_languages'] as $language) {
							$attrs = '';
							if($language == $current)
								$attrs = 'class="active"';
							echo '<li><a href="' . qtrans_convertURL($url, $language) . '" ' . $attrs . '>' . $language . '</a></li>';
						}
						?>
					</ul>
				</nav>
			<?php endif; ?>
			<div id="masthead-nav">
				<div class="clearfix">
					<nav id="main-nav">
						<ul>
							<li <?php if(is_singular('texts') || is_post_type_archive('texts')) { ?>class="active"<?php } ?>><a href="<?php echo afdm_texts_get_archive_link(); ?>"><?php _e('Texts', 'arteforadomuseu'); ?></a></li> 
							<li <?php if(is_singular('art-guide') || is_post_type_archive('art-guide')) { ?>class="active"<?php } ?>><a href="<?php echo afdm_artguides_get_archive_link(); ?>"><?php _e('Guides', 'arteforadomuseu'); ?></a></li>
							<?php
							$categories = get_categories();
							if($categories) :
								?>
								<li class="categories">
									<?php
									$current_category = array_shift(get_the_category());
									if(is_category() && $current_category) :
										$category_id = $current_category->term_id;
										?>
										<a href="<?php echo get_category_link($category_id); ?>" class="current-menu-item <?php echo $current_category->slug; ?>"><?php echo $current_category->name; ?> <span class="lsf">&#xE03e;</span></a>
									<?php else : ?>
										<a href="#"><?php _e('Categories', 'arteforadomuseu'); ?> <span class="lsf">&#xE03e;</span></a>
									<?php endif; ?>
									<ul class="category-list">
										<?php foreach($categories as $category) : ?>
											<?php if($current_category && $category->term_id == $category_id) continue; ?>
											<li>
												<a href="<?php echo get_category_link($category->term_id); ?>" class="<?php echo $category->slug; ?>"><?php echo $category->name; ?></a>
											</li>
										<?php endforeach; ?>
									</ul>
								</li>
							<?php endif; ?>
						</ul>
						<?php wp_nav_menu(array('theme_location' => 'header_menu')); ?>
					</nav>
					<?php get_search_form(); ?>
					<?php afdm_get_user_menu(); ?>
				</div>
			</div>
		</div>
	</header>

	