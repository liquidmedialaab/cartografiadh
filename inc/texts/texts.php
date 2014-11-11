<?php

/*
 * Texts
 */

class ArteForaDoMuseu_Texts {

	var $post_type = 'texts';

	var $slug = '';

	var $directory_uri = '';

	var $directory = '';

	var $is_singular = false;

	function __construct() {
		add_action('jeo_init', array($this, 'setup'));
	}

	function setup() {
		$this->set_directories();
		$this->set_slug();
		$this->setup_post_type();
		$this->setup_query();
		$this->setup_views();
		$this->setup_post();
		$this->setup_templates();
	}

	function set_directories() {
		$this->directory_uri = apply_filters('texts_directory_uri', get_stylesheet_directory_uri() . '/inc/texts');
		$this->directory = apply_filters('texts_directory', get_stylesheet_directory() . '/inc/texts');
	}

	function set_slug() {
		$this->slug = apply_filters('texts_slug', 'textos');
	}

	function setup_post_type() {
		$this->register_post_type();
		// add_filter('jeo_mapped_post_types', array($this, 'unset_from_jeo_mapped'));
	}

	function register_post_type() {

		$labels = array( 
			'name' => __('Texts', 'arteforadomuseu'),
			'singular_name' => __('Texts', 'arteforadomuseu'),
			'add_new' => __('Add text', 'arteforadomuseu'),
			'add_new_item' => __('Add new text', 'arteforadomuseu'),
			'edit_item' => __('Edit text', 'arteforadomuseu'),
			'new_item' => __('New text', 'arteforadomuseu'),
			'view_item' => __('View text', 'arteforadomuseu'),
			'search_items' => __('Search texts', 'arteforadomuseu'),
			'not_found' => __('No text found', 'arteforadomuseu'),
			'not_found_in_trash' => __('No text found in the trash', 'arteforadomuseu'),
			'menu_name' => __('Texts', 'arteforadomuseu')
		);

		$args = array( 
			'labels' => $labels,
			'hierarchical' => false,
			'description' => __('Texts', 'arteforadomuseu'),
			'supports' => array('title', 'editor', 'author', 'excerpt', 'thumbnail'),
			'taxonomies' => array('category'),
			'public' => true,
			'show_ui' => true,
			'show_in_menu' => true,
			'has_archive' => true,
			'rewrite' => array('slug' => $this->slug, 'with_front' => false)
		);

		register_post_type($this->post_type, $args);

	}

	/*
	 * Custom query stuff
	 */

	function setup_query() {
		add_action('pre_get_posts', array($this, 'guides_query'), 5);
	}

	// remove author guides and singular from geo query
	function guides_query($query) {
		if(is_post_type_archive($this->post_type) && $query->get('author')) {
			$query->set('not_geo_query', true);
		}
		if($this->is_singular || is_singular($this->post_type)) {
			$query->set('not_geo_query', true);
		}
	}

	/*
	 * Add to view system
	 */
	function setup_views() {
		add_action('afdm_views_post_types', array($this, 'register_views'));
	}

	function register_views($post_types) {
		if(!in_array($this->post_type, $post_types))
			$post_types[] = $this->post_type;

		return $post_types;
	}

	/*
	 * Store singular guide_id post
	 */

	function setup_post() {
		add_action('the_post', array($this, 'post'));
	}

	function post() {
		if(get_post_type(get_the_ID()) == $this->post_type) {
			global $post;
			$this->text = $post;
			if(is_singular($this->post_type))
				$this->is_singular = true;
		}
	}

	/*
	 * Templates
	 */

	function setup_templates() {
		add_action('template_redirect', array($this, 'templates'));
	}

	function templates() {
		// archive
		if(is_singular($this->post_type)) {
			include($this->directory . '/templates/single.php');
			exit();
		}
		if(is_post_type_archive($this->post_type)) {
			include($this->directory . '/templates/archive.php');
			exit();
		}
	}

	function get_archive_link() {
		return get_post_type_archive_link($this->post_type);
	}
}

$textos = new ArteForaDoMuseu_Texts;

function afdm_texts_get_archive_link() {
	global $textos;
	return $textos->get_archive_link();
}