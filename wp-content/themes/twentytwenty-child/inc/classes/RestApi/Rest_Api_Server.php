<?php

class Rest_Api_Server extends WP_REST_Controller {
    private function build_query_args( $request ) {

      $args = array(
                  'post_type' => $this->post_type,
                  'tax_query'     => array(
                      array(
                          'taxonomy' => $this->taxonomy,
                          'field'    => 'term_id',
                          'terms'    => $request[$this->taxonomy]
                      ),
                  ),
              );

      return $args;
    }

    public function register_routes() {
        $this->namespace = $this->namespace . $this->version;
        $this->base      = 'latest-products/(?P<product_cat>\d+)';
        register_rest_route( $this->namespace, '/' . $this->base, array (
            array(
                'methods'   => WP_REST_Server::READABLE,
                'callback'  => array( $this, 'get_products_by_category' )
              ),
            )
        );
    }

    public function get_products_by_category( WP_REST_Request $request ) {
        $posts = get_posts( $this->build_query_args($request) );

        if (empty($posts)) {
          return new WP_Error( 'empty_category', 'There are no posts to display', array('status' => 404) );
        }

        $response = new WP_REST_Response($posts);
        $response->set_status(200);

        return json_encode($response);
    }

    public function __construct( $namespace = '', $version = '1', $post_type = 'post', $taxonomy = 'category' ) {
        $this->namespace  = $namespace;
        $this->version    = $version;
        $this->post_type  = $post_type;
        $this->taxonomy   = $taxonomy;

        add_action( 'rest_api_init', array( $this, 'register_routes' ) );
    }
}
