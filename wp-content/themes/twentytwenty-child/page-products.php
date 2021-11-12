<?php
    /* Template Name: Products Page Template */
    $args = array (
        'post_type'      => 'product'
    );
    $products_query = new WP_Query( $args );
    get_header();
?>
    <main class="main main-archive-article">

        <?php get_template_part( 'inc/banner' ); ?>

        <section class="section article-archive-main-section">

            <?php
                while( $products_query->have_posts() ) : $products_query->the_post();
                    $author         = get_field( 'author' );
                    $link           = get_field( 'link' );
                    $pdf_file       = get_field( 'pdf_file' );
					$link 			= $pdf_file ? $pdf_file : $link;
                    $read_more_text = get_field( 'read_more_text', 'option' );
            ?>

                <div class="article-post">
                    <div class="row">

                        <div class="large-3 columns">
                            <?php if ( get_the_post_thumbnail_url() && $link ): ?>
                                <div class="article-thumb-wrapper match-height">
                                    <a target="_blank" href="<?php echo $link; ?>">
                                        <?php the_post_thumbnail() ?>
                                    </a>
                                </div>
                            <?php elseif ( get_the_post_thumbnail_url() ) : ?>
                                <div class="article-thumb-wrapper match-height">
                                    <?php the_post_thumbnail() ?>
                                </div>
                            <?php endif; ?>
                        </div>

                        <div class="large-9 columns">
                            <div class="article-content-col-wrapper match-height">
                                <div class="article-title-wrapper">
                                    <h4><?php the_title(); ?></h4>
                                </div>
                                <div class="article-content-wrapper clear">
                                    <div class="article-text-wrapper ">
                                        <?php the_content(); ?>
                                        <?php if ( $author ): ?>
                                            <div class="author-wrapper">
                                                <p><?php echo $author; ?></p>
                                            </div>
                                        <?php endif; ?>
                                    </div>
                                </div>
                                <?php if ( $link && $read_more_text ): ?>
                                    <div class="readmore-flex-wrap">
                                        <div class="readmore-wrapper">
                                            <a target="_blank" href="<?php echo $link; ?>"><?php echo $read_more_text; ?></a>
                                        </div>
                                    </div>
                                <?php endif; ?>
                            </div>
                        </div>

                    </div>
                </div>

            <?php endwhile; $products_query->wp_reset_query(); ?>

        </section>

    </main>
<?php get_footer(); ?>
