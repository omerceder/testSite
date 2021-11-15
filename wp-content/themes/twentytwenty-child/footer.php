<?php
/**
 * The template for displaying the footer
 *
 * Contains the opening of the #site-footer div and all content after.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?>
			<footer id="site-footer" role="contentinfo" class="site-footer header-footer-group">

				<div class="section-inner">
          <div class="container-xl">
            <div class="footer-credits">

  						<p class="footer-copyright">
  							<a href="<?php echo esc_url( home_url( '/' ) ); ?>"><?php bloginfo( 'name' ); ?></a>
                &copy; Omer Ceder
  						</p><!-- .footer-copyright -->

  					</div><!-- .footer-credits -->
          </div>
				</div><!-- .section-inner -->

			</footer><!-- #site-footer -->

		<?php wp_footer(); ?>

	</body>
</html>
