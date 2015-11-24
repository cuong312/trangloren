<?php
define('THEME_URL', get_template_directory_uri());
require_once( get_stylesheet_directory() . '/core/options.php' );
// Load the parent theme sytlesheet

function theme_enqueue_styles() {

	// Load Bootstrap
	wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/css/bootstrap.css' );
	wp_enqueue_style( 'bootstrap-theme', get_template_directory_uri() . '/css/bootstrap-theme.css' );
	wp_enqueue_style( 'font-awesome', get_template_directory_uri() . '/font-awesome/css/font-awesome.css' );
	wp_enqueue_style( 'font-awesome-cdn','https://maxcdn.bootstrapcdn.com/font-awesome/4.4.0/css/font-awesome.min.css' );
	wp_enqueue_style( 'main-style', get_template_directory_uri() . '/css/style.css' );
	wp_enqueue_style( 'new-sltyle', get_template_directory_uri() . '/css/newstyle.css' );
	wp_enqueue_style( 'responsive-stylesheet', get_template_directory_uri() . '/css/responsive.css' );
	//wp_enqueue_style( 'layer-slider', get_template_directory_uri() . '/layerslider/css/layerslider.css' );

	wp_enqueue_script( 'jquery', get_template_directory_uri() . '/js/jquery.1.9.1.js');
	wp_enqueue_script( 'testimonials', get_template_directory_uri() . '/js/testimonials.js');
	wp_enqueue_script( 'main-script', get_template_directory_uri() . '/js/script.js');
	wp_enqueue_script( 'bootstrap-script', get_template_directory_uri() . '/js/bootstrap.js');
	//wp_enqueue_script( 'html5lightbox-script', get_template_directory_uri() . '/js/html5lightbox.js');
	wp_enqueue_script( 'carouFredSel-script', get_template_directory_uri() . '/js/jquery.carouFredSel-6.2.1-packed.js');
	wp_enqueue_script( 'styleswitcher-script', get_template_directory_uri() . '/js/styleswitcher.js');
	//wp_enqueue_script( 'jquery-easing', get_template_directory_uri() . '/layerslider/JQuery/jquery-easing-1.3.js');
	//wp_enqueue_script( 'jquery-transit', get_template_directory_uri() . '/layerslider/JQuery/jquery-transit-modified.js');
	//wp_enqueue_script( 'layerslider-transitions', get_template_directory_uri() . '/layerslider/js/layerslider.transitions.js');
	//wp_enqueue_script( 'layerslider-kreaturamedia', get_template_directory_uri() . '/layerslider/js/layerslider.kreaturamedia.jquery.js');

}
add_action( 'wp_enqueue_scripts', 'theme_enqueue_styles' );

/*
	Khai bao chuc nang cua theme
*/
if ( !function_exists('cuongbui_theme_setup') ) {
	function cuongbui_theme_setup () {

		/* Thiet lap textdomain */
		$language_folder = THEME_URL . '/languages';
		load_theme_textdomain( 'cuongbui', $language_folder );

		/* Tu dong them link RSS len <head>*/
		add_theme_support( 'automatic-feed-links' );

		/* Theme post thumbnail */
		add_theme_support( 'post-thumbnails' );

		/* Post Format*/
		add_theme_support( 'post-formats', array(
				'image',
				'video',
				'gallery',
				'quote',
				'link'
			) );

		/* Theme title-tag */
		add_theme_support( 'title-tag' );

		/* Them menu */
		register_nav_menu( 'primary-menu', __('Primary Menu', 'cuongbui') );

		// /* Tao side bar */
		// $sidebar = array(
		// 	'name' => __('Main Sidebar', 'cuongbui'),
		// 	'id' => 'main-sidebar',
		// 	'description' => __('Default sidebar'),
		// 	'class' => 'main-sidebar',
		// 	'before_title' => '<h3 class="widgettitle">',
		// 	'after_title' => '</h3>'
		// 	);
		// register_sidebar( $sidebar );



	}
	add_action( 'init', 'cuongbui_theme_setup');
}

/* Thiet lap menu */

if (!function_exists('cuongbui_menu')) {
	function cuongbui_menu ($menu) {
		$menu = array(
			'theme_location' => $menu,
			'container' => 'nav',
			'container_class' => 'menu',
			'items_wrap' => '<ul id="menu-navigation">%3$s</ul>'
			);
		wp_nav_menu( $menu );
	}
}