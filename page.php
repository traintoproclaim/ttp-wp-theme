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
$context['post'] = $post;
if (is_front_page()){
	$context['home_1'] = Timber::get_widgets('home_1');
	$context['sb-spot-1'] = Timber::get_widgets('spot-1');
	$context['sb-spot-2'] = Timber::get_widgets('spot-2');
	$context['sb-spot-3'] = Timber::get_widgets('spot-3');
	$templates = array('home.twig');
} else {
	$templates = array('page-' . $post->post_name . '.twig', 'page.twig');
}
Timber::render($templates, $context);
