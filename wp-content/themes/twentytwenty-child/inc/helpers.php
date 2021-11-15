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
        'box_color' => '',
      ),
      $atts,
      'print_product'
    )
  );

  return sprintf( product_box( $product_id, $box_color, $is_shortcode=true) );
}
add_shortcode('print_product', 'print_product_box_shortcode');

// CUSTOM FUNCTIONS

// Product Box
function product_box( $product_id, $box_color='', $is_shortcode = false ) {
  $product_on_sale    = get_field('product_on_sale', $product_id);
  $product_price      = get_field('product_price',$product_id);
  $product_sale_price = get_field('product_sale_price', $product_id);

  ob_start();
  ?>

    <div class="product-block padding-3 center" <?php echo $box_color ? 'style="background-color: '.$box_color.'"': ''?>>
      <a href="<?php the_permalink( $product_id ); ?>" class="product-link" style="background-image: url(<?php echo get_the_post_thumbnail_url( $product_id ); ?>)">
        <div class="product-title">
          <h3><?php echo get_the_title( $product_id ); ?></h3>
        </div>
        <?php if ( $is_shortcode ): ?>
          <div class="product-price">
            <h4>$<?php echo $product_on_sale ? $product_sale_price : $product_price; ?></h4>
          </div>
        <?php endif; ?>
        <?php if ( $product_on_sale ): ?>
          <div class="on-sale">
            ON SALE
          </div>
        <?php endif; ?>
      </a>
    </div>

  <?php
  return ob_get_clean();
}

function print_product_box( $product_id, $box_color='', $is_shortcode = false ) {
  echo product_box( $product_id, $box_color='', $is_shortcode = false );
}


// Rest API Endpoint

add_action('rest_api_init', function () {
  register_rest_route( 'twentytwentyone-child/v1', 'latest-products/(?P<product_cat>\d+)',array(
                'methods'  => 'GET',
                'callback' => 'get_products_by_category'
      ));
});

function get_products_by_category($request) {

    $args = array (
        'post_type' => 'product',
        'tax_query'     => array(
            array(
                'taxonomy' => 'product_cat',
                'field'    => 'term_id',
                'terms'    => $request['product_cat'],
            ),
        ),
    );

    $posts = get_posts($args);

    if (empty($posts)) {
      return new WP_Error( 'empty_category', 'There are no posts to display', array('status' => 404) );
    }

    $response = new WP_REST_Response($posts);
    $response->set_status(200);

    return $response;
}
