<?php
/**
 * The template for displaying all pages.
 *
 * This is the template that displays all pages by default.
 * Please note that this is the WordPress construct of pages
 * and that other 'pages' on your WordPress site will use a
 * different template.
 *
 * To generate specific templates for your pages you can use:
 * /mytheme/views/page-mypage.twig
 * (which will still route through this PHP file)
 * OR
 * /mytheme/page-mypage.php
 * (in which case you'll want to duplicate this file and save to the above path)
 *
 * Methods for TimberHelper can be found in the /functions sub-directory
 *
 * @package  WordPress
 * @subpackage  Timber
 * @since    Timber 0.1
 */

$context = Timber::get_context();
$post = new TimberPost();
$format = $post->get_format();
$context['post'] = $post;
$context['app'] = 'ttpDefault';

// TODO need a good way to determine if this is a product page. get_post_type() doesn't seem to cut it.
// if ($post->post_content == '[productspage]' || true) {

if (is_front_page()){
	$context['home_1'] = Timber::get_widgets('home_1');
	$context['spot_1'] = Timber::get_widgets('spot_1');
	$context['spot_2'] = Timber::get_widgets('spot_2');
	$context['spot_3'] = Timber::get_widgets('spot_3');
	$templates = array('home.twig');
} else if ($post->post_name == 'results') {
	$context['app'] = 'ttpResults';
	$templates = array('page-' . $post->post_name . '.twig', 'page.twig');
} else {
	if (is_shop()) {
		while(have_posts()) {
			the_post();
	// 		$x = get_post_type();
			ob_start();
			the_content();
			$post->post_content = ob_get_contents();
			ob_end_clean();
			break;
		}
	}
	$templates = array('page-' . $post->post_name . '.twig', 'page.twig');
}

Timber::render($templates, $context);
