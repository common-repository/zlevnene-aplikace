<?php
/*
Plugin Name: Zlevněné aplikace
Description: Plugin se zlevněnými aplikacemi pro Váš web.
Version: 1.0.8
Author: Dalibor Bačovský
*/

define('ZLEVAPP_API', 'http://zlevneneaplikace.cz/api.php');

require_once __DIR__ . '/widget.php';

function za_ajax() {
	$query = '';

	if(!empty($_GET['posts'])) {
		$query = 'posts=' . $_GET['posts'] . '&';
	}
	
	if(!empty($_GET['category'])) {
		$query .= 'category=' . $_GET['category'];
	}

	$apps = json_decode(file_get_contents(ZLEVAPP_API . '?' . $query));

	foreach($apps as $app) {
		extract((array)$app);
		include __DIR__ . '/ajax_template.php';
	}

	exit;
}

add_action('wp_ajax_za_ajax', 'za_ajax');
add_action('wp_ajax_nopriv_za_ajax', 'za_ajax');

function za_scripts() {	
	wp_enqueue_script('za-js', plugins_url('js/za.js', __FILE__), array('jquery'));
	wp_localize_script('za-js', 'loadIndic', plugins_url('images/wpspin_light.gif', __FILE__));
	
	wp_enqueue_style('za-css', plugins_url('css/za.css', __FILE__));
}

add_action('wp_enqueue_scripts', 'za_scripts');