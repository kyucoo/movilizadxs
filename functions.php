<?php
function init_template(){
    add_theme_support('post-thumbnails');
    add_theme_support('title-tag');
}
add_action('after_setup_theme', 'init_template');
/**
 * function class navwalker
 */
add_action('after_setup_theme', 'register_navwalker');
function register_navwalker(){
    require_once get_template_directory() . '/class-wp-bootstrap-navwalker.php';
}
/**
 * registrar librerias
 */
function register_libraries(){
    //registrar css
    wp_register_style('bootstrap', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/css/bootstrap.min.css', '', '4.6.0', 'all');
    wp_register_style('fontawesome', 'https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css', '', '5.15.4', 'all');
    wp_register_style('swiperjs_css', 'https://unpkg.com/swiper@7/swiper-bundle.min.css', '', '7.2.0', 'all');
    // generar dependencia en style.css
    wp_enqueue_style('estilos', get_stylesheet_uri(), array('bootstrap', 'fontawesome', 'swiperjs_css'),'1.0.0' ,'all');
    // registrar js
    wp_register_script('pooper', 'https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js', '', '4.6.0', true);
    // poner en cola
    wp_enqueue_script('jquery', true);
    wp_enqueue_script('ligthBoxjs', get_template_directory_uri().'/assets/js/fslightbox.js', '', '3.3.0', true);
    wp_enqueue_script('swiperjs', 'https://unpkg.com/swiper@7/swiper-bundle.min.js', '', '7.2.0', true);
    wp_enqueue_script('bootstrapJS', 'https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js', array('jquery', 'pooper', 'swiperjs', 'ligthBoxjs'), '4.6.0', true);
    wp_enqueue_script('mobysuiteJS', 'https://cdn.mobysuite.com/form-scrapper/js/app.js', '', '', false);
    wp_enqueue_script('customJS', get_template_directory_uri().'/assets/js/scripts.js?v=1.0', '', '1.0', true);
}
add_action('wp_enqueue_scripts', 'register_libraries');
/**
 * custom logo
 */
function themename_custom_logo_setup() {
    $defaults = array(
        'height'               => 500,
        'width'                => 500,
        'flex-height'          => true,
        'flex-width'           => true,
        'header-text'          => array( 'site-title', 'site-description' ),
        'unlink-homepage-logo' => true, 
    );
 
    add_theme_support( 'custom-logo', $defaults );
}
add_action( 'after_setup_theme', 'themename_custom_logo_setup' );
/**
* registro de menú principal
*/
add_action('after_setup_theme', 'registro_menu');
function registro_menu(){
    register_nav_menus([
        'menu-principal' => 'Menú principal',
    ]);
} 
/**
 * registrar googlefonts
 */
add_action("wp_enqueue_scripts", "google_fonts_pw");
function google_fonts_pw(){
    $url = "https://fonts.googleapis.com/css2?family=Open+Sans:wght@400;500;700&display=swap";
    wp_enqueue_style('google_fonts', $url);
 }
 /**
 * Registrar fuentes directamente 
 */
/*  
    add_action('wp_enqueue_scripts', function () {
    wp_enqueue_style('golden', get_stylesheet_directory_uri() . '/assets/fonts/goldenhopes/stylesheet.css');
    wp_enqueue_style('arquitecta', get_stylesheet_directory_uri() . '/assets/fonts/arquitecta/stylesheet.css');
}); 
*/