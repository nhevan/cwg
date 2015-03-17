<?php

//include('includes/theme_options_page.php');
//require_once('includes/heartPlus.php');
require('includes/settings.php');
function enqueue_scripts_nd_styles() {
	//loading parent's stylesheet
	wp_enqueue_style( 'parent-theme', get_template_directory_uri() . '/style.css' );
	//loading Bootstrap css
	wp_enqueue_style( 'bootstrapcss', get_stylesheet_directory_uri() . '/resources/css/bootstrap.min.css' );
	
	//loading bxSlider js with jQuery as dependency
	wp_enqueue_script('bxlsider',get_stylesheet_directory_uri() . '/resources/js/jquery.bxslider.min.js', array('jquery'),'4.1.2',true);
	//loading bxSlider css
	wp_enqueue_style( 'bxslidercss', get_stylesheet_directory_uri() . '/resources/css/jquery.bxslider.css' );
	
	
	//loading custom js with jQuery as dependency
	wp_enqueue_script('customjs',get_stylesheet_directory_uri() . '/resources/js/custom.js', array('jquery'),'1.0',true);
	//enqueueing Bootstrap JS with jQuery as Dependency
	wp_enqueue_script(
		'bootstrapjs',
		get_stylesheet_directory_uri() . '/resources/js/bootstrap.min.js',
		array( 'jquery' ),
		'3.2.0',
		true
	);
}

add_action( 'wp_enqueue_scripts', 'enqueue_scripts_nd_styles' );


//footer sidebar link set 1
register_sidebar( array(
    'name' => __( 'Footer Link Set 1 widget holder', 'cahp' ),
    'id' => 'footer-linkset-1',
    'description' => __( 'Holds footer links custom menu widget under The Services', 'cahp' ),
    'before_title' => '<h1>',
    'after_title' => '</h1>',
) );

//footer sidebar link set 2
register_sidebar( array(
    'name' => __( 'Footer Link Set 2 widget holder', 'cahp' ),
    'id' => 'footer-linkset-2',
    'description' => __( 'Holds footer links custom menu widget under The Services', 'cahp' ),
    'before_title' => '<h1>',
    'after_title' => '</h1>',
) );

//registering custom post types

function create_posttype() {
  register_post_type( 'testimonials',
    array(
      'labels' => array(
        'name' => __( 'Testimonials' ),
        'singular_name' => __( 'Testimonial' )
      ),
      'public' => true,
      'has_archive' => true,
      'rewrite' => array('slug' => 'testimonials'),
    )
  );
}
//heart count function
function heartPlus() 
{
    wp_localize_script( 'HeartPlusFunction', 'ajax_heart_script', array( 'ajaxurl' => admin_url( 'admin-ajax.php' ) ) );

}
add_action('template_redirect','heartPlus');


add_action("wp_ajax_nopriv_heartPlusAction" , "heartPlusAction");


?>