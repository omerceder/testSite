<?php
  $product_description = get_field('product_description');
  $product_video = get_field('product_video');
?>

<section class="section description-section">
  <div class="container-sm">

    <?php if ( $product_description ): ?>
      <div class="description-wrapper">
        <div class="description-title">
          <h2>Here's a short description of the product:</h2>
          <p><?php echo $product_description; ?></p>
        </div>
      </div>
    <?php endif; ?>

    <?php if ( $product_video ): ?>
      <div class="video-wrapper">
        <div class="video-title">
          <h2>Check out this video:</h2>
          <?php print_r($product_video); ?>
        </div>
      </div>
    <?php endif; ?>

  </div>
</section>
