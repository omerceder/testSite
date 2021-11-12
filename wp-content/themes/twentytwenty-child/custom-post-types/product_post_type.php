<?php

if ( ! function_exists('product_post_type') ) {

// Register Custom Post Type
function product_post_type() {

	$labels = array(
		'name'                  => _x( 'Products', 'Post Type General Name', 'wptest' ),
		'singular_name'         => _x( 'Product', 'Post Type Singular Name', 'wptest' ),
		'menu_name'             => __( 'Products', 'wptest' ),
		'name_admin_bar'        => __( 'Product', 'wptest' ),
		'archives'              => __( 'Product Archives', 'wptest' ),
		'attributes'            => __( 'Product Attributes', 'wptest' ),
		'parent_item_colon'     => __( 'Parent Product:', 'wptest' ),
		'all_items'             => __( 'All Products', 'wptest' ),
		'add_new_item'          => __( 'Add New Product', 'wptest' ),
		'add_new'               => __( 'Add New', 'wptest' ),
		'new_item'              => __( 'New Product', 'wptest' ),
		'edit_item'             => __( 'Edit Product', 'wptest' ),
		'update_item'           => __( 'Update Product', 'wptest' ),
		'view_item'             => __( 'View Product', 'wptest' ),
		'view_items'            => __( 'View Products', 'wptest' ),
		'search_items'          => __( 'Search Product', 'wptest' ),
		'not_found'             => __( 'Not found', 'wptest' ),
		'not_found_in_trash'    => __( 'Not found in Trash', 'wptest' ),
		'featured_image'        => __( 'Featured Image', 'wptest' ),
		'set_featured_image'    => __( 'Set featured image', 'wptest' ),
		'remove_featured_image' => __( 'Remove featured image', 'wptest' ),
		'use_featured_image'    => __( 'Use as featured image', 'wptest' ),
		'insert_into_item'      => __( 'Insert into product', 'wptest' ),
		'uploaded_to_this_item' => __( 'Uploaded to this product', 'wptest' ),
		'items_list'            => __( 'Products list', 'wptest' ),
		'items_list_navigation' => __( 'Products list navigation', 'wptest' ),
		'filter_items_list'     => __( 'Filter product list', 'wptest' ),
	);
	$args = array(
		'label'                 => __( 'Product', 'wptest' ),
		'description'           => __( 'Product Description', 'wptest' ),
		'labels'                => $labels,
		'supports'              => array( 'title', 'editor', 'thumbnail', 'custom-fields' ),
		'taxonomies'            => array( 'product_cat' ),
		'hierarchical'          => false,
		'public'                => true,
		'show_ui'               => true,
		'show_in_menu'          => true,
		'menu_position'         => 5,
		'menu_icon'             => 'dashicons-products',
		'show_in_admin_bar'     => true,
		'show_in_nav_menus'     => true,
		'can_export'            => true,
		'has_archive'           => true,
		'exclude_from_search'   => false,
		'publicly_queryable'    => true,
		'capability_type'       => 'page',
		'show_in_rest'          => true,
	);
	register_post_type( 'product', $args );

}
add_action( 'init', 'product_post_type', 0 );

}
