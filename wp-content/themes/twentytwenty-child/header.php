<?php
/**
 * Header file for the Twenty Twenty WordPress default theme.
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package WordPress
 * @subpackage Twenty_Twenty
 * @since Twenty Twenty 1.0
 */

?><!DOCTYPE html>

<html class="no-js" <?php language_attributes(); ?>>

	<head>

		<meta name="theme-color" content="#457db4" />

		<meta charset="<?php bloginfo( 'charset' ); ?>">
		<meta name="viewport" content="width=device-width, initial-scale=1.0" >

		<link rel="profile" href="https://gmpg.org/xfn/11">

		<?php wp_head(); ?>

	</head>

	<body <?php body_class(); ?>>

		<?php
		wp_body_open();
		?>

		<header id="site-header" class="site-header header-footer-group" role="banner">
			<div class="logo-wrapper">
				<a href="<?php echo esc_url( home_url( '/' ) ); ?>" class="home-logo-link">
					<img src="<?php echo get_bloginfo('stylesheet_directory').'/assets/img/shoppy-logo-transparent512.png'; ?>" alt="Shoppy Logo" class="shoppy-logo">
				</a>
			</div>
		</header><!-- #site-header -->
