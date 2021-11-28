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

// CUSTOM FUNCTIONS

// Rest API Endpoint

// add_action('rest_api_init', function () {
//   register_rest_route( 'twentytwentyone-child/v1', 'latest-products/(?P<product_cat>\d+)',array(
//                 'methods'  => 'GET',
//                 'callback' => 'get_products_by_category'
//       ));
// });
//
// function get_products_by_category($request) {
//     $args = array (
//         'post_type' => 'product',
//         'tax_query'     => array(
//             array(
//                 'taxonomy' => 'product_cat',
//                 'field'    => 'term_id',
//                 'terms'    => $request['product_cat'],
//             ),
//         ),
//     );
//
//     $posts = get_posts($args);
//
//     if (empty($posts)) {
//       return new WP_Error( 'empty_category', 'There are no posts to display', array('status' => 404) );
//     }
//
//     $response = new WP_REST_Response($posts);
//     $response->set_status(200);
//
//     return $response;
// }



/**
 * Create a REST API server.
 *
 */

 $rest_server = new Rest_Api_Server( 'twentytwentyone-child/v', '1', 'product', 'product_cat');
