<?php
/**
 * The header for a single portfolio post
 */

?><!doctype html>
<html <?php language_attributes(); ?>>
<head>
<meta charset="<?php bloginfo( 'charset' ); ?>">
<meta name="viewport" content="width=device-width, initial-scale=1">
<link rel="profile" href="http://gmpg.org/xfn/11">

<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<div class="wrapper portfolio-wrapper">
  <header class="portfolio__header">
		<a href="<?php echo esc_url( home_url( '/') ); ?>" class="logo portfolio-single__logo">
				<img class="portfolio-single__logo__img" src="<?php echo get_template_directory_uri() . '/images/logo-single.png'; ?>" alt="Logo">
		</a>
  </header>
