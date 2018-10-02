<?php
	/*-----------------------------------------------------------------------------------*/
	/* This file will be referenced every time a template/page loads on your Wordpress site
	/* This is the place to define custom fxns and specialty code
	/*-----------------------------------------------------------------------------------*/

// Define the version so we can easily replace it throughout the theme
define( 'APP_VERSION', '1.0');

/*-----------------------------------------------------------------------------------*/
/* Add Rss feed support to Head section
/*-----------------------------------------------------------------------------------*/
add_theme_support( 'automatic-feed-links' );

remove_filter( 'the_title', 'wptexturize' );

//Custom image sizes
add_theme_support('post-thumbnails');
// add_image_size('case-study-large', 860, 420, false); //true is hard crop mode
// add_image_size('case-study-thumb', 660, 370, true); //true is hard crop mode
// add_image_size('hero-large', 1440, 640, false); //true is hard crop mode
// add_image_size('product-featured-image', 560, 560, false); //true is hard crop mode

//
// add_filter('image_size_names_choose', 'wpshout_custom_sizes');
// function wpshout_custom_sizes($sizes)
// {
//     return array_merge($sizes, array(
//       'map-thumbnail' => __('Map Thumbnail'),
//     ));
// }


/*
	Register Nav Menus
 */

function registerMenus() {
 // register_nav_menu('main-navigation',__( 'Main Navigation' ));
 // register_nav_menu('footer-brands',__( 'Footer Brands' ));
 // register_nav_menu('footer-legal',__( 'Footer Legal' ));
}

add_action( 'init', 'registerMenus' );


/*-----------------------------------------------------------------------------------*/
/* Enqueue Styles and Scripts
/*-----------------------------------------------------------------------------------*/

function theme_scripts()  {

	// get the theme directory style.css and link to it in the header
	wp_enqueue_style('styles.css', get_template_directory_uri() . '/compiled/css/styles.css');

	// // add theme scripts
	wp_enqueue_script( 'js', get_template_directory_uri() . '/compiled/js/bundle.js', array(), APP_VERSION, true ); // last true is in footer
	wp_enqueue_script( 'modernizr', get_template_directory_uri() . '/compiled/js/modernizr-bundle.js', array(), APP_VERSION, false ); // last true is in footer

	wp_deregister_script('wp-embed');

}

add_action( 'wp_enqueue_scripts', 'theme_scripts' ); // Register this fxn and allow Wordpress to call it automatcally in the header
