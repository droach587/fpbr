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

function registerMenus() {
 register_nav_menu('main-navigation',__( 'Main Navigation' ));
 register_nav_menu('about-pages-navigation',__( 'About Pages Navigation' ));
 register_nav_menu('footer-nav-col-one',__( 'Footer Nav Col One' ));
 register_nav_menu('footer-nav-col-two',__( 'Footer Nav Col Two' ));
 register_nav_menu('footer-nav-col-three',__( 'Footer Nav Col Three' ));
}

add_action( 'init', 'registerMenus' );

function arphabet_widgets_init() {

	register_sidebar(array(
		'name'          => 'Footer Social',
		'id'            => 'footer_social',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	));

  register_sidebar(array(
		'name'          => 'Footer Copyright',
		'id'            => 'footer_copyright',
		'before_widget' => '',
		'after_widget'  => '',
		'before_title'  => '<span class="hidden">',
		'after_title'   => '</span>',
	));

}

add_action( 'widgets_init', 'arphabet_widgets_init' );

function scrapeImage($text) {
    $pattern = '/src=[\'"]?([^\'" >]+)[\'" >]/';
    preg_match($pattern, $text, $link);
    $link = $link[1];
    $link = urldecode($link);
    return $link;

}


function get_all_custom_post($type, $ppp = '3000', $cn = '', $order = 'DESC', $exclude = ''){

    $args = array(
        'post_type'=>$type,
        'posts_per_page'=> $ppp,
        'order'=>$order,
        'orderby'=>'date',
        'category_name' => $cn,
        'post_status'=>'publish',
        'post__not_in' => array($exclude),
    );
    $myposts = get_posts( $args );

    return $myposts;

    wp_reset_postdata();
}

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
