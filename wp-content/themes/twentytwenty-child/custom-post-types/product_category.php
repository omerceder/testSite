<?php

if ( ! function_exists( 'product_cat' ) ) {

// Register Custom Taxonomy
function product_cat() {

	$labels = array(
		'name'                       => _x( 'Product Categories', 'Taxonomy General Name', 'wptest' ),
		'singular_name'              => _x( 'Product Category', 'Taxonomy Singular Name', 'wptest' ),
		'menu_name'                  => __( 'Product Categories', 'wptest' ),
		'all_items'                  => __( 'All Product Categories', 'wptest' ),
		'parent_item'                => __( 'Parent Product Category', 'wptest' ),
		'parent_item_colon'          => __( 'Parent Product Category:', 'wptest' ),
		'new_item_name'              => __( 'New Product Category Name', 'wptest' ),
		'add_new_item'               => __( 'Add New Product Category', 'wptest' ),
		'edit_item'                  => __( 'Edit Product Category', 'wptest' ),
		'update_item'                => __( 'Update Product Category', 'wptest' ),
		'view_item'                  => __( 'View Product Category', 'wptest' ),
		'separate_items_with_commas' => __( 'Separate items with commas', 'wptest' ),
		'add_or_remove_items'        => __( 'Add or remove items', 'wptest' ),
		'choose_from_most_used'      => __( 'Choose from the most used', 'wptest' ),
		'popular_items'              => __( 'Popular Product Categories', 'wptest' ),
		'search_items'               => __( 'Search Product Categories', 'wptest' ),
		'not_found'                  => __( 'Not Found', 'wptest' ),
		'no_terms'                   => __( 'No Product Categories', 'wptest' ),
		'items_list'                 => __( 'Product Categories list', 'wptest' ),
		'items_list_navigation'      => __( 'Items list navigation', 'wptest' ),
	);
	$args = array(
		'labels'                     => $labels,
		'hierarchical'               => true,
		'public'                     => true,
		'show_ui'                    => true,
		'show_admin_column'          => true,
		'show_in_nav_menus'          => true,
		'show_tagcloud'              => true,
		'show_in_rest'               => true,
	);
	register_taxonomy( 'product_cat', array( 'product' ), $args );

}
add_action( 'init', 'product_cat', 0 );

}
