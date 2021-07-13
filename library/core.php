<?php


// include the main.js script in the header on the front-end.
function p_scripts() {
	wp_enqueue_script( 'main-js', get_stylesheet_directory_uri() . '/js/main.js?v=15', array( 'jquery' ), false, true );
}
add_action( 'wp_enqueue_scripts', 'p_scripts' );



// parse the query string
function parse_query_string() {
	$url_parts = wp_parse_url( $_SERVER['REQUEST_URI'] );
	parse_str( $url_parts['query'], $query_args );
	return $query_args;
}



// register a couple nav menus
register_nav_menus( array(
	'main-menu' => 'Main',
	'anthem-categories' => 'Anthem - Featured Categories',
	'footer-links' => 'Footer - Links',
	'footer-resources' => 'Footer - Resources'
) );



// register a generic sidebar.
register_sidebar( array(
	'id' => 'sidebar-generic',
	'name'=> 'General Sidebar',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="widget-title"><h4>',
    'after_title' => '</h4></div>',
) );
register_sidebar( array(
	'id' => 'jobs-sidebar',
	'name'=> 'Jobs Sidebar',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="widget-title"><h4>',
    'after_title' => '</h4></div>',
) );
register_sidebar( array(
	'id' => 'anthem-sidebar',
	'name'=> 'Anthem Sidebar',
    'before_widget' => '<div class="widget %2$s">',
    'after_widget' => '</div>',
    'before_title' => '<div class="widget-title"><h4>',
    'after_title' => '</h4></div>',
) );



// add title tag support to the theme
add_theme_support('title-tag');



// boolean to see if it's the dev site.
function is_dev() {
	if ( stristr( $_SERVER['HTTP_HOST'], 'test.nwcua.test' ) ) {
		return true;
	}
	return false;
}


