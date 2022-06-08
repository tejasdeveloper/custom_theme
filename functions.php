<?php

include "menus.php"; //Menu Walker
include "include/woo_support.php"; 
//include "include/wpbakery.php";
define('TEMPLATE_URL', get_template_directory_uri());
define('SITE_URL', get_site_url());


add_action( 'init', 'init_themecustom' );
function init_themecustom(){
	if ( function_exists('register_nav_menus' )) {
		register_nav_menus(
			array(
				'primary'	=> 'Primary Navigation Menu',
				
			)
		);
	}
}

add_action( 'get_header', 'add_script_in_header' );
function add_script_in_header(){
	global $wp_styles; // Global Variable to modify attrbute 
	
	//wp_enqueue_style('tejas-font-awesome', TEMPLATE_URL . '/fontawesome/font-awesome.css');
	wp_enqueue_style('tejas-font-awesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0/css/all.min.css');
	
	
	wp_enqueue_style('tejas-owl.carousel', TEMPLATE_URL ."/vendor/owl.carousel/assets/owl.carousel.min.css");
	wp_enqueue_style('tejas-owl.carouseltheme', TEMPLATE_URL ."/vendor/owl.carousel/assets/owl.theme.green.css");
	
	wp_enqueue_style('tejas-slicktheme', TEMPLATE_URL ."/slick/slick-theme.css");
	wp_enqueue_style('tejas-slickcss', TEMPLATE_URL ."/slick/slick.css");
	
	$google_font = "https://fonts.googleapis.com/css2?family=Poppins:wght@300;400&family=Raleway:wght@300;400;500;600&display=swap";	
	wp_enqueue_style('robotogoogle', $google_font);

	wp_enqueue_style('theme_style', TEMPLATE_URL ."/style.css");
	wp_enqueue_style('theme_basic', TEMPLATE_URL ."/css/basic.css");
	wp_enqueue_style('theme_mobilemenu', TEMPLATE_URL ."/css/mobile-menu.css",array(), '1', 'screen and (max-width: 768px)');
	wp_enqueue_style('theme_mobile', TEMPLATE_URL ."/css/mobile.css",array(), '1', 'screen and (max-width: 768px)');
	
	//wp_enqueue_style('customfonts', TEMPLATE_URL ."/css/font-style.css");
	
	
	
	
	
}

add_action( 'get_footer', 'add_script_in_footer' );
function add_script_in_footer(){
	
	
	wp_enqueue_script('tejas-slickjs', TEMPLATE_URL . '/slick/slick.js',array("jquery"));
	wp_enqueue_script('tejas-owl.carousel', TEMPLATE_URL . '/vendor/owl.carousel/owl.carousel.min.js',array("jquery"));
	wp_enqueue_script('tejas-custominit', TEMPLATE_URL . '/js/custom-init.js',array("jquery"));
}

function register_theme_sidebars() {
    register_sidebar( array(
        'name'          => __( 'Footer About', 'textdomain' ),
        'id'            => 'footer1',
        'description'   => __( 'footer', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	 register_sidebar( array(
        'name'          => __( 'Footer Links', 'textdomain' ),
        'id'            => 'footer2',
        'description'   => __( 'footer', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer My Account', 'textdomain' ),
        'id'            => 'footer3',
        'description'   => __( 'footer', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	register_sidebar( array(
        'name'          => __( 'Footer Social', 'textdomain' ),
        'id'            => 'footer4',
        'description'   => __( 'footer', 'textdomain' ),
        'before_widget' => '<li id="%1$s" class="widget %2$s">',
        'after_widget'  => '</li>',
        'before_title'  => '<h2 class="widgettitle">',
        'after_title'   => '</h2>',
    ) );
	
	
}
add_action( 'widgets_init', 'register_theme_sidebars' );


add_action( 'init', 'create_custom_post_for_theme', 0 );
function create_custom_post_for_theme() {

	register_post_type( 'slickslider',
		array(
			'labels' => array(
				'name'               => __( 'Slide', 'acg' ),
				'singular_name'      => __( 'Slide', 'acg' ),
				'add_new'            => __( 'Add New Slide', 'acg' ),
				'add_new_item'       => __( 'Add Slide', 'acg' ),
				'new_item'           => __( 'Add Slide', 'acg' ),
				'view_item'          => __( 'View Slide', 'acg' ),
				'search_items'       => __( 'Search Slides', 'acg' ),
				'edit_item'          => __( 'Edit Slides', 'acg' ),
				'all_items'          => __( 'All Slides', 'acg' ),
				'not_found'          => __( 'No Slide found', 'acg' ),
				'not_found_in_trash' => __( 'No Slide found in Trash', 'acg' )
			),

			
			'public'            => TRUE,
			'show_ui'           => TRUE,
			'capability_type'   => 'post',
			'hierarchical'      => FALSE,
			'rewrite'           => array(),
			'query_var'         => TRUE,
			'supports'          => array('title','thumbnail'),
			'menu_position'     => 10,			
			'has_archive'       => TRUE,
			'show_in_nav_menus' => TRUE,
			'menu_icon'         => 'dashicons-businessman'
		)
	);
	
	
	add_theme_support( 'post-thumbnails', array( 'slickslider' ) );
}
/*function add_acf_menu_pages()
{
    acf_add_options_page(array(
        'page_title' => 'Theme Settings',
        'menu_title' => 'Theme options',
        'menu_slug' => 'theme-options',
        'capability' => 'manage_options',
        'position' => 61.1,
        'redirect' => true,
        'icon_url' => 'dashicons-admin-customizer',
        'update_button' => 'Save options',
        'updated_message' => 'Options saved',
    ));

    
}
add_action('acf/init', 'add_acf_menu_pages');*/




/*add_action( 'init', 'create_custom_post_for_theme', 0 );
function create_custom_post_for_theme() {

	register_post_type( 'hometestimonial',
		array(
			'labels' => array(
				'name'               => __( 'Testimonial', 'acg' ),
				'singular_name'      => __( 'Testimonial', 'acg' ),
				'add_new'            => __( 'Add New Testimonial', 'acg' ),
				'add_new_item'       => __( 'Add Testimonial', 'acg' ),
				'new_item'           => __( 'Add Testimonial', 'acg' ),
				'view_item'          => __( 'View Testimonials', 'acg' ),
				'search_items'       => __( 'Search Testimonials', 'acg' ),
				'edit_item'          => __( 'Edit Testimonials', 'acg' ),
				'all_items'          => __( 'All Testimonials', 'acg' ),
				'not_found'          => __( 'No Testimonial found', 'acg' ),
				'not_found_in_trash' => __( 'No Testimonial found in Trash', 'acg' )
			),

			
			'public'            => TRUE,
			'show_ui'           => TRUE,
			'capability_type'   => 'post',
			'hierarchical'      => FALSE,
			'rewrite'           => array(),
			'query_var'         => TRUE,
			'supports'          => array('title'),
			'menu_position'     => 10,			
			'has_archive'       => TRUE,
			'show_in_nav_menus' => TRUE,
			'menu_icon'         => 'dashicons-businessman'
		)
	);
	
	
	register_post_type( 'homecasestudy',
		array(
			'labels' => array(
				'name'               => __( 'Case Study', 'acg' ),
				'singular_name'      => __( 'Case Study', 'acg' ),
				'add_new'            => __( 'Add New Case Study', 'acg' ),
				'add_new_item'       => __( 'Add Case Study', 'acg' ),
				'new_item'           => __( 'Add Case Study', 'acg' ),
				'view_item'          => __( 'View Case Study', 'acg' ),
				'search_items'       => __( 'Search Case Study', 'acg' ),
				'edit_item'          => __( 'Edit Case Study', 'acg' ),
				'all_items'          => __( 'All Case Study', 'acg' ),
				'not_found'          => __( 'No Case Study found', 'acg' ),
				'not_found_in_trash' => __( 'No Case Study found in Trash', 'acg' )
			),

			
			'public'            => TRUE,
			'show_ui'           => TRUE,
			'capability_type'   => 'post',
			'hierarchical'      => FALSE,
			'rewrite'           => array(),
			'query_var'         => TRUE,
			'supports'          => array('title'),
			'menu_position'     => 10,			
			'has_archive'       => TRUE,
			'show_in_nav_menus' => TRUE,
			'menu_icon'         => 'dashicons-businessman'
		)
	);
}*/

add_shortcode( 'sociallink', 'sociallink' );
function sociallink( $atts ) {
    $atts = shortcode_atts( array(
        'icon' => 'facebook',
        'link' => ''		
    ), $atts, 'sociallink' );
	
	if($atts["icon"]=="facebook"){ 
		$outputHTML =  "<a class='socialround' href='".$atts["link"]."'><i class='fa fa-facebook' aria-hidden='true'></i></a>";
    }
	if($atts["icon"]=="twitter"){ 
		$outputHTML =  "<a class='socialround' href='".$atts["link"]."'><i class='fa fa-twitter' aria-hidden='true'></i></a>";
    }
	if($atts["icon"]=="instagram"){ 
		$outputHTML =  "<a class='socialround' href='".$atts["link"]."'><i class='fa fa-instagram' aria-hidden='true'></i></a>";
    }
	 
    return $outputHTML;
}

include "woo-support.php";


?>