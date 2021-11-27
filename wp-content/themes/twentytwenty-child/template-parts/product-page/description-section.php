<?php
  global $post;
  $post_id = $post->ID;
  $product_description = get_post_meta( $post_id, 1, true );
  $product_video_id    = get_post_meta( $post_id, 5, true );
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

    <?php if ( $product_video_id ): ?>
      <div class="video-wrapper">
        <div class="video-title">
          <h2>Check out this video:</h2>
          <iframe width="1440" height="762" src="https://www.youtube-nocookie.com/embed/<?php print_r($product_video_id); ?>"
          frameborder="0" allow="autoplay; encrypted-media" allowfullscreen></iframe>
        </div>
      </div>
    <?php endif; ?>

  </div>
</section>
