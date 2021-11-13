<?php
  get_header();
?>

  <main class="main single-product">
    <?php get_template_part('template-parts/layout/hero') ?>

    <?php get_template_part('template-parts/product-page/price-section') ?>

    <?php get_template_part('template-parts/product-page/description-section') ?>

    <?php get_template_part('template-parts/product-page/gallery-section') ?>

    <?php get_template_part('template-parts/product-page/related-products-section') ?>
  </main>

<?php get_footer(); ?>
