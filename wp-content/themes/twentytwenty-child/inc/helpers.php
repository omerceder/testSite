<?php

// Hide admin bar for user 'wp-test'
add_action('after_setup_theme', 'remove_admin_bar');
  function remove_admin_bar() {
    if (wp_get_current_user()->user_login == 'wp-test' ) {
      show_admin_bar(false);
    }
}

// SHORTCODE

function print_product_box_shortcode( $atts = array() ) {
  extract(
    shortcode_atts(
      array(
        'product_id' => '',
        'box_color'  => '',
      ),
      $atts,
      'print_product'
    )
  );

  $box_generator = new ProductBoxGenerator($atts);

  return $box_generator->generate($product_id, $box_color);

}
add_shortcode('print_product', 'print_product_box_shortcode');

/**
* Create a REST API server.
*
*/

$rest_server = new Rest_Api_Server(
    'twentytwentyone-child/v', 
    '1',
    'product',
    'product_cat',
    [1,2,3,4,5,11,12,13,14,15,16]
);
