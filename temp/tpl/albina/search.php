<?php
/**
 * Template Name: Search
 */

$b_tpl = 'search';

$_posts = array();

if(have_posts()) {
	while (have_posts()) {
		the_post();
		
		$_posts[] = get_post(get_the_ID());
		
	}
}

$Azbn->tpl('_/header', array());
$Azbn->tpl($b_tpl.'/index', array(
	'posts' => $_posts,
));
$Azbn->tpl('_/footer', array());
