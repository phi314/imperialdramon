<?php
/**
 * Listable Child functions and definitions
 *
 * Bellow you will find several ways to tackle the enqueue of static resources/files
 * It depends on the amount of customization you want to do
 * If you either wish to simply overwrite/add some CSS rules or JS code
 * Or if you want to replace certain files from the parent with your own (like style.css or main.js)
 *
 * @package ListableChild
 */




/**
 * Setup Listable Child Theme's textdomain.
 *
 * Declare textdomain for this child theme.
 * Translations can be filed in the /languages/ directory.
 */
function listable_child_theme_setup() {
	load_child_theme_textdomain( 'listable-child-theme', get_stylesheet_directory() . '/languages' );
}
add_action( 'after_setup_theme', 'listable_child_theme_setup' );


/**
 *
 * 1. Add a Child Theme "style.css" file
 * ----------------------------------------------------------------------------
 *
 * If you want to add static resources files from the child theme, use the
 * example function written below.
 *
 */

function listable_child_enqueue_styles() {
	$theme = wp_get_theme();
	// use the parent version for cachebusting
	$parent = $theme->parent();

	if ( is_rtl() ) {
		wp_enqueue_style( 'listable-rtl-style', get_template_directory_uri() . '/rtl.css', array(), $parent->get( 'Version' ) );
	} else {
		wp_enqueue_style( 'listable-main-style', get_template_directory_uri() . '/style.css', array(), $parent->get( 'Version' ) );
	}

	// Here we are adding the child style.css while still retaining
	// all of the parents assets (style.css, JS files, etc)
	wp_enqueue_style( 'listable-child-style',
		get_stylesheet_directory_uri() . '/style.css',
		array('listable-style') //make sure the the child's style.css comes after the parents so you can overwrite rules
	);
}

add_action( 'wp_enqueue_scripts', 'listable_child_enqueue_styles' );





/**
 *
 * 2. Overwrite Static Resources (eg. style.css or main.js)
 * ----------------------------------------------------------------------------
 *
 * If you want to overwrite static resources files from the parent theme
 * and use only the ones from the Child Theme, this is the way to do it.
 *
 */


/*

function listable_child_overwrite_files() {

	// 1. The "main.js" file
	//
	// Let's assume you want to completely overwrite the "main.js" file from the parent

	// First you will have to make sure the parent's file is not loaded
	// See the parent's function.php -> the listable_scripts_styles() function
	// for details like resources names

		wp_dequeue_script( 'listable-scripts' );


	// We will add the main.js from the child theme (located in assets/js/main.js)
	// with the same dependecies as the main.js in the parent
	// This is not required, but I assume you are not modifying that much :)

		wp_enqueue_script( 'listable-child-scripts',
			get_stylesheet_directory_uri() . '/assets/js/main.js',
			array( 'jquery' ),
			'1.0.0', true );



	// 2. The "style.css" file
	//
	// First, remove the parent style files
	// see the parent's function.php -> the hive_scripts_styles() function for details like resources names

		wp_dequeue_style( 'listable-style' );


	// Now you can add your own, modified version of the "style.css" file

		wp_enqueue_style( 'listable-child-style',
			get_stylesheet_directory_uri() . '/style.css'
		);
}

// Load the files from the function mentioned above:

	add_action( 'wp_enqueue_scripts', 'listable_child_overwrite_files', 11 );

// Notes:
// The 11 priority parameter is need so we do this after the function in the parent so there is something to dequeue
// The default priority of any action is 10

*/

/* Woocommerce Override */

// Override Billing
add_filter( 'woocommerce_billing_fields' , 'unleashed_billing_fields' );
function unleashed_billing_fields( $fields ) {
    unset($fields['billing_country']);
    unset($fields['billing_state']);

    $US_fields['billing_first_name']             = $fields['billing_first_name'];
    $US_fields['billing_last_name']              = $fields['billing_last_name'];
    $US_fields['billing_address_1']              = $fields['billing_address_1'];
    $US_fields['billing_address_2']              = $fields['billing_address_2'];

    // Override field Provinsi
    $US_fields['billing_provinsi']                  = array();
    $US_fields['billing_provinsi']['type']           = 'select';
    $US_fields['billing_provinsi']['label']         = __( 'Provinsi', 'listable' );
    $US_fields['billing_provinsi']['class']         = array( 'form-row-wide','address-field', 'update_totals_on_change' );
    $US_fields['billing_provinsi']['options']       = array(
        '6' => 'DKI Jakarta',
        '9' => 'Jawa Barat'
    );
    $US_fields['billing_provinsi']['required']       = TRUE;
    $US_fields['billing_provinsi']['placeholder']    = __( 'Pilih Provinsi', 'listable' );

    $US_fields['billing_postcode']               = $fields['billing_postcode'];

    // Tambah custom field kota untuk billing field
    $US_fields['billing_kota']                   = array();
    $US_fields['billing_kota']['type']           = 'select';
    $US_fields['billing_kota']['label']          = __( 'Kota / Kabupaten', 'listable' );
    $US_fields['billing_kota']['class']          = array( 'form-row-wide','address-field', 'update_totals_on_change' );
    $US_fields['billing_kota']['options']        = array( '' => '' );
    $US_fields['billing_kota']['required']       = TRUE;
    $US_fields['billing_kota']['placeholder']    = __( 'Pilih Kota / Kabupaten', 'listable' );

    $US_fields['billing_email']                  = $fields['billing_email'];
    $US_fields['billing_phone']                  = $fields['billing_phone'];

    $US_fields['account'] 	= $fields['account'];
    $US_fields['order'] 	= $fields['order'];

    return $US_fields;
}

// Override Shipping
add_filter( 'woocommerce_shipping_fields' , 'unleashed_shipping_fields' );
function unleashed_shipping_fields( $fields ) {
    unset($fields['shipping_country']);
    unset($fields['shipping_state']);

    $US_fields['shipping_first_name']           = $fields['shipping_first_name'];
    $US_fields['shipping_last_name']            = $fields['shipping_last_name'];
    $US_fields['shipping_address_1']            = $fields['shipping_address_1'];
    $US_fields['shipping_address_2']            = $fields['shipping_address_2'];

    // Override field Provinsi
    $US_fields['shipping_provinsi']                  = array();
    $US_fields['shipping_provinsi']['type']           = 'select';
    $US_fields['shipping_provinsi']['label']         = __( 'Provinsi', 'listable' );
    $US_fields['shipping_provinsi']['class']         = array( 'form-row-wide','address-field', 'update_totals_on_change' );
    $US_fields['shipping_provinsi']['options']       = array(
        '6' => 'DKI Jakarta',
        '9' => 'Jawa Barat'
    );
    $US_fields['shipping_provinsi']['required']       = TRUE;
    $US_fields['shipping_provinsi']['placeholder']    = __( 'Pilih Provinsi', 'listable' );

    $US_fields['shipping_postcode']             = $fields['shipping_postcode'];

    // Tambah custom field kota untuk shipping field
    $US_fields['shipping_kota']                 = array();
    $US_fields['shipping_kota']['type']         = 'select';
    $US_fields['shipping_kota']['label']        = __( 'Kota', 'agenwebsite' );
    $US_fields['shipping_kota']['class']        = array( 'form-row-wide','address-field' );
    $US_fields['shipping_kota']['options']      = array( '0' => 'Pilih Kota' );
    $US_fields['shipping_kota']['required']     = TRUE;
    $US_fields['shipping_kota']['placeholder']  = __( 'Pilih Kota', 'listable' );

    $US_fields['account'] 	= $fields['account'];
    $US_fields['order'] 	= $fields['order'];

    return $US_fields;
}

// Override Checkout
add_filter( 'woocommerce_checkout_fields' , 'unleashed_checkout_fields' );
function unleashed_checkout_fields( $fields ) {
    unset($fields['billing']['billing_country']);
    unset($fields['billing']['billing_state']);

    unset($fields['shipping']['shipping_country']);
    unset($fields['shipping']['shipping_state']);

    $US_fields['billing']['billing_first_name']             = $fields['billing']['billing_first_name'];
    $US_fields['billing']['billing_last_name']              = $fields['billing']['billing_last_name'];
    $US_fields['billing']['billing_address_1']              = $fields['billing']['billing_address_1'];
    $US_fields['billing']['billing_address_2']              = $fields['billing']['billing_address_2'];

    // Override field Provinsi
    $US_fields['billing']['billing_provinsi']                  = array();
    $US_fields['billing']['billing_provinsi']['type']           = 'select';
    $US_fields['billing']['billing_provinsi']['label']         = __( 'Provinsi', 'listable' );
    $US_fields['billing']['billing_provinsi']['class']         = array( 'form-row-wide','address-field', 'update_totals_on_change' );
    $US_fields['billing']['billing_provinsi']['options']       = array(
        '6' => 'DKI Jakarta',
        '9' => 'Jawa Barat'
    );
    $US_fields['billing']['billing_provinsi']['required']       = TRUE;
    $US_fields['billing']['billing_provinsi']['placeholder']    = __( 'Pilih Provinsi', 'listable' );

    $US_fields['billing']['billing_postcode']               = $fields['billing']['billing_postcode'];

    // Tambah custom field kota untuk billing field
    $US_fields['billing']['billing_kota']                   = array();
    $US_fields['billing']['billing_kota']['type']           = 'select';
    $US_fields['billing']['billing_kota']['label']          = __( 'Kota / Kabupaten', 'listable' );
    $US_fields['billing']['billing_kota']['class']          = array( 'form-row-wide','address-field', 'update_totals_on_change' );
    $US_fields['billing']['billing_kota']['options']        = array( '' => '' );
    $US_fields['billing']['billing_kota']['required']       = TRUE;
    $US_fields['billing']['billing_kota']['placeholder']    = __( 'Pilih Kota / Kabupaten', 'listable' );

    $US_fields['billing']['billing_email']                  = $fields['billing']['billing_email'];
    $US_fields['billing']['billing_phone']                  = $fields['billing']['billing_phone'];



    $US_fields['shipping']['shipping_first_name']           = $fields['shipping']['shipping_first_name'];
    $US_fields['shipping']['shipping_last_name']            = $fields['shipping']['shipping_last_name'];
    $US_fields['shipping']['shipping_address_1']            = $fields['shipping']['shipping_address_1'];
    $US_fields['shipping']['shipping_address_2']            = $fields['shipping']['shipping_address_2'];

    // Override field Provinsi
    $US_fields['shipping']['shipping_provinsi']                  = array();
    $US_fields['shipping']['shipping_provinsi']['type']           = 'select';
    $US_fields['shipping']['shipping_provinsi']['label']         = __( 'Provinsi', 'listable' );
    $US_fields['shipping']['shipping_provinsi']['class']         = array( 'form-row-wide','address-field', 'update_totals_on_change' );
    $US_fields['shipping']['shipping_provinsi']['options']       = array(
        '6' => 'DKI Jakarta',
        '9' => 'Jawa Barat'
    );
    $US_fields['shipping']['shipping_provinsi']['required']       = TRUE;
    $US_fields['shipping']['shipping_provinsi']['placeholder']    = __( 'Pilih Provinsi', 'listable' );

    $US_fields['shipping']['shipping_postcode']             = $fields['shipping']['shipping_postcode'];

    // Tambah custom field kota untuk shipping field
    $US_fields['shipping']['shipping_kota']                 = array();
    $US_fields['shipping']['shipping_kota']['type']         = 'select';
    $US_fields['shipping']['shipping_kota']['label']        = __( 'Kota', 'agenwebsite' );
    $US_fields['shipping']['shipping_kota']['class']        = array( 'form-row-wide','address-field' );
    $US_fields['shipping']['shipping_kota']['options']      = array( '0' => 'Pilih Kota' );
    $US_fields['shipping']['shipping_kota']['required']     = TRUE;
    $US_fields['shipping']['shipping_kota']['placeholder']  = __( 'Pilih Kota', 'listable' );

    $US_fields['account'] 	= $fields['account'];
    $US_fields['order'] 	= $fields['order'];

    return $US_fields;
}


/* End Woocommerce Override */
