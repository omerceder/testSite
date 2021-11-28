<?php
/* enqueue scripts and style from parent theme */

function twentytwenty_child_styles() {

  // wp_enqueue_style( 'parent-style', get_template_directory_uri() . '/style.css' );
  wp_enqueue_style( 'child-style', get_stylesheet_directory_uri() . '/styles/child-style.css', array( 'parent-style' ) );

    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
    array( 'twenty-twenty-style' ) );

    // Register Webpack stylesheet and JS
    wp_enqueue_style( 'site_main_css', get_stylesheet_directory_uri() . '/css/build/main.min.css' );
    wp_enqueue_script( 'site_main_js', get_stylesheet_directory_uri() . '/js/build/app.js' , null , null , true );

    // Slick styles:
    wp_enqueue_style( 'slick_css', get_stylesheet_directory_uri() . '/css/src/slick/slick.css' );
}
add_action( 'wp_enqueue_scripts', 'twentytwenty_child_styles');

// Load custom post types and taxonomies:
include_once( get_stylesheet_directory() .'/custom-post-types/product_post_type.php');
include_once( get_stylesheet_directory() .'/custom-post-types/product_category.php');

// Load classes:

/* REST_API */
include_once( get_stylesheet_directory() .'/inc/Classes/RestApi/Rest_Api_Server.php');

/* Product Box Generator */
include_once( get_stylesheet_directory() .'/inc/Classes/ProductBoxGenerator/ProductBoxGenerator.php');

/* Product Meta Boxes */
include_once( get_stylesheet_directory() .'/inc/Classes/MetaBoxes/MetaBoxGenerator/MetaBoxGenerator.php'); // Meta Box Generator Class (Abstract Parent)
include_once( get_stylesheet_directory() .'/inc/Classes/MetaBoxes/ProductFieldsMetaBox/ProductFieldsMetaBox.php'); // Product Fields Generator Class (Child)
include_once( get_stylesheet_directory() .'/inc/Classes/MetaBoxes/ProductImageGalleryMetaBox/ProductImageGalleryMetaBox.php'); // Product Gallery Class (Child)

// Load helpers file (for all custom functions):
include_once( get_stylesheet_directory() .'/inc/helpers.php');
