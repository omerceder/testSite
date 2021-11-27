<?php
    /**
    * Shortcode product box template.
    *
    * Available variables:
    *
    *  ?
    */

    global $post;
    $product_on_sale    = get_post_meta( $product_id, 4, true );
    $product_price      = get_post_meta( $product_id, 2, true );
    $product_sale_price = get_post_meta( $product_id, 3, true );
?>

<div class="product-block padding-3 center" <?php echo isset($box_color) ? 'style="background-color: '.$box_color.'"': ''?>>
  <a href="<?php the_permalink( $product_id ); ?>" class="product-link" style="background-image: url(<?php echo get_the_post_thumbnail_url( $product_id ); ?>)">
    <div class="product-title">
      <h3><?php echo get_the_title( $product_id ); ?></h3>
    </div>
    <div class="product-price">
      <h4>$<?php echo $product_on_sale ? $product_sale_price : $product_price; ?></h4>
    </div>
    <?php if ( $product_on_sale ): ?>
      <div class="on-sale">
        ON SALE
      </div>
    <?php endif; ?>
  </a>
</div>
