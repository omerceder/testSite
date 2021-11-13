<?php
  $product_image_gallery = get_field('product_image_gallery');
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
                <img src="<?php echo $image['url']; ?>" alt="<?php echo $image['title']; ?>">
              </div>
            </div>
          <?php endforeach; ?>

        </div>
      </div>
    </div>
  </section>
<?php endif; ?>
