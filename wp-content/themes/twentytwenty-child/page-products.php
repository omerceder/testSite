<?php
    /* Template Name: Products Page Template */

    get_header();
?>
    <main class="main main-archive-products">

        <?php get_template_part( 'template-parts/layout/hero' ); ?>

        <section class="section products-grid-section">
            <div class="products-grid">
              <?php
                $args = array (
                    'post_type' => 'product'
                );
                $products_query = new WP_Query( $args );

                while($products_query->have_posts()) {
                $products_query->the_post();
                    print_product_box( $post->ID);
                }
                $products_query->wp_reset_query();
              ?>
            </div>
        </section>

    </main>
<?php get_footer(); ?>
