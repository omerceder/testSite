<?php
  $product_hero_class = '';
  $product_hero_image = '';
  if ( is_singular( 'product' ) ) {
    $product_hero_class = 'product-hero';
    $product_hero_image = 'style="background-image: url('.get_the_post_thumbnail_url().');"';
  }
?>

<section class="section hero-section <?php echo $product_hero_class; ?>" <?php echo $product_hero_image; ?>>
  <div class="container">
    <div class="page-title">
      <h1><?php the_title(); ?></h1>
    </div>
    <div class="hero-content">
      <p><?php the_content(); ?></p>
    </div>
  </div>
</section>
