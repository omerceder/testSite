<?php
/* enqueue scripts and style from parent theme */

function twentytwenty_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
    array( 'twenty-twenty-style' ), );
}
add_action( 'wp_enqueue_scripts', 'twentytwenty_styles');

// Load Custom Post Types:
include_once( get_stylesheet_directory() .'/custom-post-types/product_post_type.php');

// Load Custom Taxonomies:
include_once( get_stylesheet_directory() .'/custom-post-taxonomies/product_category.php');

// Load helpers file (for all custom functions):
include_once( get_stylesheet_directory() .'/helpers.php');
