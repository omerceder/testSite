<?php
  global $post;
  $post_id = $post->ID;
  $product_on_sale    = get_post_meta( $post_id, 4, true );
  $product_price      = get_post_meta( $post_id, 2, true );
  $product_sale_price = get_post_meta( $post_id, 3, true );
?>

<section class="section product-price-section">
  <div class="container">
    <?php if ( $product_on_sale ): ?>
      <div class="sale-banner">
        <h2>ON SALE!!!</h2>
      </div>
    <?php endif; ?>
    <?php if ( $product_price ): ?>
      <div class="price">
        <h3>Only $<?php echo $product_on_sale ? $product_sale_price : $product_price; ?>!</h3>
      </div>
    <?php endif; ?>
  </div>
</section>
