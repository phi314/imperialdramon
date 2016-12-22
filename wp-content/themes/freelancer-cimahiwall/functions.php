<?php
/**
 * Created by "Unleashed Studios".
 * User: phi314
 * Date: 12/4/16
 * Time: 1:28 AM
 */

function flcmw_theme_style()
{
    wp_enqueue_style( 'bootstrap_css', get_template_directory_uri() . '/css/bootstrap.min.css');
    wp_enqueue_style( 'freelancer_css', get_template_directory_uri() . '/css/freelancer.css');
    wp_enqueue_style( 'style_css', get_template_directory_uri() . '/style.css');
}

add_action( 'wp_enqueue_scripts', 'flcmw_theme_style' );

function flcmw_theme_js()
{
    wp_enqueue_script( 'bootstrap_js', get_template_directory_uri() . '/js/bootstrap.min.js', ['jquery'], '', true );
    wp_enqueue_script( 'font_awesome_js', 'https://use.fontawesome.com/4984280da9.js', ['jquery'], '', true );
    wp_enqueue_script( 'jquery_easing_js', 'http://cdnjs.cloudflare.com/ajax/libs/jquery-easing/1.3/jquery.easing.min.js', ['jquery'], '', true );
    wp_enqueue_script( 'classie_js', get_template_directory_uri() . '/js/classie.js', ['jquery'], '', true );
    wp_enqueue_script( 'cbpAnimatedHeader_js', get_template_directory_uri() . '/js/cbpAnimatedHeader.js', ['jquery'], '', true );
    wp_enqueue_script( 'jqBootstrapValidation_js', get_template_directory_uri() . '/js/jqBootstrapValidation.js', ['jquery'], '', true );
    wp_enqueue_script( 'contact_me_js', get_template_directory_uri() . '/js/contact_me.js', ['jquery'], '', true );
    wp_enqueue_script( 'freelancer_js', get_template_directory_uri() . '/js/freelancer.js', ['jquery'], '', true );
}

add_action( 'wp_enqueue_scripts', 'flcmw_theme_js' );