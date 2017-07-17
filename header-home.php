<?php
/**
 * The header for the home page, home-template.php
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
<div class="homepage-wrap">
	<header id="top" class="hero js-hero" style="background-image: url(<?php the_post_thumbnail_url(); ?>); ">
		<a href="<?php echo esc_url( home_url( '/') ); ?>" class="logo hero__logo">
				<img class="hero__logo__img" src="<?php the_field('site_logo'); ?>" alt="Logo">
		</a>
    <div class="hero__intro">
      <p class="hero__intro__greeting"><?php the_field('header_greeting'); ?></p>
      <p class="hero__intro__name"><?php the_field('header_full_name'); ?></p>
      <p class="hero__intro__bio"><?php the_field('header_bio'); ?></p>
    </div>
    <a href="#about-one-section" class="scroll js-scroll">
      <div class="scroll__button"><span class="scroll__button__span">&sdot;</span></div>
      <div class="scroll__arrows">
        <img src="<?php echo get_template_directory_uri() . '/images/scroll_arrows.png'; ?>" alt="">
      </div>
    </a>
	</header><!-- .hero -->
  <nav class="fixed-nav">
      <a class="line active js-line js-scroll" href="#top"></a>
      <a class="line js-line js-scroll" href="#about-one-section"></a>
      <a class="line js-line js-scroll" href="#about-two-section"></a>
      <a class="line js-line js-scroll" href="#works-section"></a>
      <a class="line js-line js-scroll" href="#contact-section"></a>
  </nav>
