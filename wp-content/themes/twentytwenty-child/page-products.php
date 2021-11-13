<?php
    /* Template Name: Products Page Template */

    get_header();
?>
    <main class="main main-archive-products">

        <?php get_template_part( 'template-parts/hero' ); ?>

        <section class="section products-grid-section">
            <div class="products-grid">
              <?php
                  $args = array (
                      'post_type'      => 'product'
                  );
                  $products_query = new WP_Query( $args );

                  while( $products_query->have_posts() ) : $products_query->the_post();

                  $product_on_sale = get_field('product_on_sale');
              ?>

                <div class="product-block border-1 padding-3 center">
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

              <?php endwhile; $products_query->wp_reset_query(); ?>
            </div>
        </section>

    </main>
<?php get_footer(); ?>
