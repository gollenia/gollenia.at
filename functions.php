<?php

$script = require_once(__DIR__ . "/version.php");
add_action( 'wp_enqueue_scripts', function() use($script) {
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/style.css' , [],
		$script['version']
	);
	wp_dequeue_style( 'wp-block-library' );
	wp_dequeue_style( 'wp-block-library-theme' );
} );

add_action( 'admin_enqueue_scripts', function() use($script) {
	wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/admin.css' , [],
		$script['version']
	);
} );

add_action( 'wp_head', function(){
	echo '<link rel="apple-touch-icon" type="image/png" sizes="180x180" href="' . get_stylesheet_directory_uri() . '/favicons/favicon_' . get_locale() . '_180.png" />';
	echo '<link rel="icon" type="image/png" sizes="32x32" href="' . get_stylesheet_directory_uri() . '/favicons/favicon_' . get_locale() . '_32.png" />';
	echo '<link rel="icon" type="image/png" sizes="16x16" href="' . get_stylesheet_directory_uri() . '/favicons/favicon_' . get_locale() . '_16.png" />';
});


/*
function slug_page_template() {
	$page_type_object = get_post_type_object( 'page' );
	$page_type_object->template = [
		[ 'ctx-blocks/base' ],
	];
	//$page_type_object->template_lock = ['removal', 'insert'];
}
add_action( 'init', 'slug_page_template', 1000 );
 */