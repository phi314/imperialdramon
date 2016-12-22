<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 12/6/16
 * Time: 11:48 PM
 */

//define('WP_HOME', '/cimahiwall');
//define('WP_SITEURL', '/cimahiwall');

add_theme_support( 'menus' );

function agcmw_register_theme_menus()
{
    register_nav_menus(
        array(
            'primary-menu' => __('Primary menu')
        )
    );
}

add_action( 'init', 'agcmw_register_theme_menus' );

function agcmw_theme_style()
{
    wp_enqueue_style( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/css/bootstrap.min.css');
    wp_enqueue_style( 'agency', get_template_directory_uri(). '/css/agency.css');
    wp_enqueue_style( 'font_awesome', get_template_directory_uri(). '/vendor/font-awesome/css/font-awesome.min.css');
    wp_enqueue_style( 'superslides', get_template_directory_uri(). '/css/superslides.css');
    wp_enqueue_style( 'style', get_template_directory_uri(). '/style.css');
}

add_action( 'wp_enqueue_scripts', 'agcmw_theme_style' );

function agcmw_theme_js()
{
    wp_enqueue_script( 'bootstrap', get_template_directory_uri() . '/vendor/bootstrap/js/bootstrap.min.js', '', '', true);
    wp_enqueue_script( 'jquery_easing', get_template_directory_uri(). '/js/jquery.easing.min.js', '', '', true);
    wp_enqueue_script( 'classie', get_template_directory_uri(). '/js/classie.js', '', '', true);
    wp_enqueue_script( 'cbpAnimatedHeader', get_template_directory_uri(). '/js/cbpAnimatedHeader.min.js', '', '', true);
    wp_enqueue_script( 'jquery_superslides', get_template_directory_uri(). '/js/jquery.superslides.min.js', '', '', true);
    wp_enqueue_script( 'agency', get_template_directory_uri(). '/js/agency.js', '', '', true);
}

add_action( 'wp_enqueue_scripts', 'agcmw_theme_js' );

/* ACF google map api */
function my_acf_google_map_api( $api ){
    $api['key'] = 'AIzaSyAmrMh2vBuIYT4aExmJH0YC_Bzt7x5S5js';
    return $api;
}
add_filter('acf/fields/google_map/api', 'my_acf_google_map_api');

/* Woocommerce */
function agcmw_woocommerce_style()
{
    wp_enqueue_style( 'shop_homepage', get_template_directory_uri(). '/css/shop-homepage.css');
}

// if page shop only
if(is_page( 'shop' ))
{
    add_action( 'wp_enqueue_scripts', 'agcmw_woocommerce_style' );
}

function woocommerce_support() {
    add_theme_support( 'woocommerce' );
}

add_action( 'after_setup_theme', 'woocommerce_support' );
/* END Woocommerce  */

