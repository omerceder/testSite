<?php
  global $post;
  $post_id = $post->ID;
  $product_image_gallery = array();
  for ( $image_field_id=11; $image_field_id < 16; $image_field_id++  ) {
    array_push( $product_image_gallery, get_post_meta( $post_id, $image_field_id, true ) );
  }
?>

<?php if ( $product_image_gallery ): ?>
  <section class="section product-gallery-section">
    <div class="container">
      <div class="gallery-wrapper">
        <div class="gallery-title">
          <h2>Image Gallery:</h2>
        </div>
        <div class="gallery-slider">

          <?php foreach ($product_image_gallery as $image): ?>
            <div class="gallery-slide">
              <div class="gallery-image">
                <img src="<?php echo $image; ?>" alt="">
              </div>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
