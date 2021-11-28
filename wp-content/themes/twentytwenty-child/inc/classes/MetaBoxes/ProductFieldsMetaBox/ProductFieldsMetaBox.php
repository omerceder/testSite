<?php

/**
 * Generates Product Fields Meta Boxe
 */

// Meta Box Class: ProductFieldsMetaBox
// Get the field value: $metavalue = get_post_meta( $post_id, $field_id, true );
class ProductFieldsMetaBox extends MetaBoxGenerator{
	public function __construct(...$args) {
	    parent:: __construct(...$args);
	}
}

if ( class_exists('ProductFieldsMetabox') ) {
		new ProductFieldsMetabox(
			array('product'),
			array(
			              array(
			                  'label' => 'Description',
			                  'id' => '1',
			                  'type' => 'textarea',
			              ),

			              array(
			                  'label' => 'Price',
			                  'id' => '2',
			                  'default' => '0',
			                  'type' => 'number',
			              ),

			              array(
			                  'label' => 'Sale Price',
			                  'id' => '3',
			                  'default' => '0',
			                  'type' => 'number',
			              ),

			              array(
			                  'label' => 'Is On Sale',
			                  'id' => '4',
			                  'default' => 'false',
			                  'type' => 'checkbox',
			              ),

			              array(
			                  'label' => 'Youtube Video ID',
			                  'id' => '5',
			                  'type' => 'url',
			              )

			),
			'Product Fields',
			'ProductFields',
			'wptest',
			'normal',
			'default'
		);
}
