<?php 
remove_action( 'template_redirect', 'redirect_canonical' );
// Redirect all requests to index.php so the Vue app is loaded and 404s aren't thrown
function remove_redirects() {
	add_rewrite_rule( '^/(.+)/?', 'index.php', 'top' );
}
add_action( 'init', 'remove_redirects' );

// Load scripts
function load_wpvue_dist() {
	// wp_enqueue_script(
	// 	'wp-vue-js',
	// 	get_stylesheet_directory_uri() . '/dist/scripts/index.min.bundle.js',
	// 	array( 'jquery' ),
	// 	filemtime( get_stylesheet_directory() . '/dist/scripts/index.min.bundle.js' ),
	// 	true
	// );
	wp_enqueue_script(
			'wp-vue-js',get_stylesheet_directory_uri() . '/app.js',array(),filemtime( get_stylesheet_directory() . '/.js' ),true);
	
	wp_enqueue_style(
		'wp-vue-css',
		get_stylesheet_directory_uri() . '/styles.css',
		null,
		filemtime( get_stylesheet_directory() . '/styles.css' )
	);
}
add_action( 'wp_enqueue_scripts', 'load_wpvue_dist', 100 );
