<?php
/**
 * Shortcode product box template.
 *
 * Available variables:
 *
 *  ?
 */

 $product_on_sale = isset($product_on_sale) ? : false;
 $product_price = isset($product_price) ? : 0;

?>
<div class="product-block padding-3 center" <?php echo $box_color ? 'style="background-color: '.$box_color.'"': ''?>>
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
