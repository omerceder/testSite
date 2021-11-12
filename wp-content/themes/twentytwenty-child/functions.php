<?php
/* enqueue scripts and style from parent theme */

function twentytwentyone_styles() {
    wp_enqueue_style( 'child-style', get_stylesheet_uri(),
    array( 'twenty-twenty-style' ), );
}
add_action( 'wp_enqueue_scripts', 'twentytwenty_styles');

// Load helpers file (for all custom functions):
include_once( get_stylesheet_directory() .'/helpers.php');
