<?php

	define('THEME_URL', get_template_directory_uri());

	add_theme_support('post-formats');
	add_theme_support('post-thumbnails');
	add_theme_support('menus');
	$customerHeaderDefault = array(
			'default-image'          => '',
			'random-default'         => false,
			'width'                  => 0,
			'height'                 => 0,
			'flex-height'            => false,
			'flex-width'             => false,
			'default-text-color'     => '',
			'header-text'            => true,
			'uploads'                => true,
			'wp-head-callback'       => '',
			'admin-head-callback'    => '',
			'admin-preview-callback' => '',
	);
	add_theme_support('custom-header', $customerHeaderDefault);
	add_theme_support( 'html5', array('comment-list', 'comment-form', 'search-form', 'gallery', 'caption'));
	
	add_filter('get_twig', 'add_to_twig');
	add_filter('timber_context', 'add_to_context');

	add_action('wp_enqueue_scripts', 'ttp_load_scripts');

	function add_to_context($data){
		/* this is where you can add your own data to Timber's context object */
		$data['header'] = get_custom_header();
		$data['menu'] = new TimberMenu();
		
		// TODO remove
		$data['qux'] = 'I am a value set in your functions.php file';
		
		return $data;
	}

	function add_to_twig($twig){
		/* this is where you can add your own fuctions to twig */
		$twig->addExtension(new Twig_Extension_StringLoader());
		$twig->addFilter('myfoo', new Twig_Filter_Function('myfoo'));
		return $twig;
	}

	function myfoo($text){
    	$text .= ' bar!';
    	return $text;
	}

	function ttp_load_scripts(){
// 		wp_enqueue_script('jquery');
		
		wp_enqueue_script('angular',          THEME_URL . "/vendor_bower/angular/angular.js");
		wp_enqueue_script('angular-route',    THEME_URL . "/vendor_bower/angular-route/angular-route.js");
		wp_enqueue_script('angular-resource', THEME_URL . "/vendor_bower/angular-resource/angular-resource.js");
		wp_enqueue_script('angular-ui',       THEME_URL . "/vendor_bower/angular-ui-bootstrap-bower/ui-bootstrap-tpls.js");

		wp_enqueue_script('default', THEME_URL . "/client/default/ng-app.js");
		
		if (WP_DEBUG) {
			// Add the LiveReload script
			wp_enqueue_script('reload', "http://traintoproclaim.local:35729/livereload.js?snipver=1");
		}
		
	}
