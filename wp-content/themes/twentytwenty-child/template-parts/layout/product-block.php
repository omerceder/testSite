<?php
    global $post;
    $post_id = $post->ID;
    $product_sale_price = get_post_meta( $post_id, 3, true );
?>

<div class="product-block padding-3 center">
  <a href="<?php the_permalink(); ?>" class="product-link" style="background-image: url(<?php echo get_the_post_thumbnail_url(); ?>)">
    <div class="product-title">
      <h3><?php the_title(); ?></h3>
    </div>
    <?php if ( $product_on_sale ): ?>
      <div class="on-sale">
        ON SALE
      </div>
    <?php endif; ?>
  </a>
</div>
