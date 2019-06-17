<?php
/**
 * The Header for our theme.
 *
 * Displays all of the <head> section and everything up till <div id="content-vw">
 *
 * @package VW Ecommerce Store
 */

?><!DOCTYPE html>

<html <?php language_attributes(); ?>>

	<head>
		<!-- Global site tag (gtag.js) - Google Analytics -->
<script async src="https://www.googletagmanager.com/gtag/js?id=UA-142242196-1"></script>
<script>
  window.dataLayer = window.dataLayer || [];
  function gtag(){dataLayer.push(arguments);}
  gtag('js', new Date());

  gtag('config', 'UA-142242196-1');
</script>
	  	<meta charset="<?php bloginfo( 'charset' ); ?>">
	  	<meta name="viewport" content="width=device-width">
	  	<link rel="profile" href="<?php echo esc_url( __( 'http://gmpg.org/xfn/11', 'vw-ecommerce-store' ) ); ?>">
	  	<?php wp_head(); ?>
	</head>

	<body <?php body_class(); ?>>

		<?php get_template_part( 'template-parts/header/top-shop-now' ); ?>
		<div class="home-page-header">
			<?php get_template_part('template-parts/header/top-header'); ?>
			<?php get_template_part('template-parts/header/middle-header'); ?>			
			<?php get_template_part( 'template-parts/header/navigation' ); ?>
		</div>