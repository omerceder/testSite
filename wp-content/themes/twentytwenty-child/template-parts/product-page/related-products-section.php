<?php
  $current_product_cat      = get_the_terms( $post->ID, 'product_cat' );
  $current_product_cat_id   = $current_product_cat[0]->term_id;
  $current_product_cat_name = $current_product_cat[0]->name;

  $related_args = array(
    'post_type'     => 'product',
    'post__not_in'  => array( $post->ID ),
    'tax_query'     => array(
        array(
            'taxonomy' => 'product_cat',
            'field'    => 'term_id',
            'terms'    => $current_product_cat_id,
        ),
    ),
  );

  $related_query = new WP_Query( $related_args );
?>

<section class="section related-products-section">
  <div class="container">
    <div class="related-products-title">
      <h2>Want More <?php echo $current_product_cat_name; ?>?</h2>
    </div>
    <div class="related-products-wrapper">
      <?php
      while($related_query->have_posts()) {
        $related_query->the_post();
          $product_box = new ProductBoxGenerator();
          print_r($product_box->generate($post->ID));
        }
        $related_query->wp_reset_query();
      ?>
    </div>
  </div>
</section>
