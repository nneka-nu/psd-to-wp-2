<?php
/**
 * Template part for displaying homepage content (home-template.php)
 */

?>

<section id="about-one-section" class="about about-one js-about-one" style="background-image: url(<?php the_field('about_one_bg_img'); ?>)">
  <div class="about__wrapper about-one__wrapper">
    <div class="about__content">
      <div class="horiz-line"></div>
      <h1 class="about__num">
        01
        <img src="<?php echo get_template_directory_uri() . '/images/forward_slash.png'; ?>" alt="">
      </h1>
      <h2 class="about__title">
        <?php the_field('about_one_title_one'); ?>
        <span class="about__title--gray"><?php the_field('about_one_title_two'); ?></span>
      </h2>
      <p class="about__text"><?php the_field('about_one_desc'); ?></p>
    </div>
    <?php
      $img_id = get_field('about_one_photo');
      $alt_text = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
    ?>
    <div class="about__img__wrap">
      <img class="about__img about-one__img js-about-one__img" src="<?php echo wp_get_attachment_image_src(  $img_id, 'about-image' )[0]; ?>" alt="<?php echo $alt_text ? $alt_text : 'Photo'; ?>">
    </div>
  </div><!-- .about__wrapper -->
</section><!-- .about.about-one -->

<section  id="about-two-section" class="about about-two js-about-two" style="background-image: url(<?php the_field('about_two_bg_img'); ?>)">
  <div class="about__wrapper about-two__wrapper">
    <?php
      $img_id = get_field('about_two_photo');
      $alt_text = get_post_meta( $img_id, '_wp_attachment_image_alt', true );
    ?>
    <div class="about-two__img__wrap">
      <img class="about__img about-two__img js-about-two__img" src="<?php echo wp_get_attachment_image_src(  $img_id, 'about-image' )[0]; ?>" alt="<?php echo $alt_text ? $alt_text : 'Photo'; ?>">
    </div>
    <div class="about__content">
      <h1 class="about__num">
        <img src="<?php echo get_template_directory_uri() . '/images/forward_slash.png'; ?>" alt="">
        02
      </h1>
      <div class="horiz-line"></div>
      <h2 class="about__title">
        <?php the_field('about_two_title_one'); ?>
        <span class="about__title--gray"><?php the_field('about_two_title_two'); ?></span>
      </h2>
      <p class="about__text"><?php the_field('about_two_desc'); ?></p>
    </div>
  </div><!-- .about__wrapper -->
</section><!-- .about.about-two -->

<div class="about-works-divider js-divider"></div>

<section id="works-section" class="works js-works" style="background-image: url(<?php  the_field('portfolio_bg_img'); ?>)">
  <header class="works__header">
    <h1 class="works__num">03</h1>
    <h2 class="works__heading"><?php the_field('portfolio_heading_one'); ?></h2>
    <p class="works__heading--strike"><span><?php the_field('portfolio_heading_two'); ?></span></p>
  </header>
  <div class="works__grid">
    <?php
      $num_of_posts = 8;
      $sizes = array();

      // Set image sizes for WP loop
      for($i = 1; $i <= ceil( $num_of_posts / 2 ); $i++) {
          $alternate = $i % 4 == 0 ? true : false;

          for($j = 1; $j <= 2; $j++) {
              if ($i%2 != 0) {
                  $sizes[] = '570';   
              } else { // for even rows
                  if ($j%2 != 0) {
                      $sizes[] = $alternate ? '670' : '470';   
                  } else {
                      $sizes[] = $alternate ? '470' : '670';
                  }
                  
              }
          }
      }
    ?>
    <?php
      $args = array(
        'post_type' => 'portfolio',
        'posts_per_page' => $num_of_posts
      );
      $query = new WP_Query( $args );
      $pos = 0;
      while ( $query->have_posts() ) : $query->the_post();
        $alt_text = get_post_meta( get_post_thumbnail_id(), '_wp_attachment_image_alt', true );
      ?>     
        <div class="<?php echo 'works__images works__images--' .  $sizes[$pos]; ?>">
          <img class="works__img" src="<?php the_post_thumbnail_url( 'portfolio-' . $sizes[$pos] ); ?>" alt="<?php echo $alt_text ? $alt_text : 'Photo'; ?>">
          <a href="<?php the_permalink(); ?>" class="overlay works__overlay works__overlay--<?php echo $sizes[$pos]; ?>">
            <div class="works__content">
              <p class="works__title"><?php echo ucwords(strtolower(get_the_title())); ?></p>
              <p class="works__category">
                <?php 
                  $termsObj = get_the_terms( get_the_ID(), 'portfolio_categories' );
                  $terms = array();

                  foreach($termsObj as $term) :
                    $terms[] = $term->name;
                  endforeach;

                  echo implode(', ', $terms);
                ?>
              </p>
            </div>
          </a>
        </div>
        <?php $pos++; ?>
      <?php endwhile; ?>
    <?php wp_reset_postdata(); ?>
  </div>
  
</section>

<div class="quote js-quote">
  <div class="quote__bg-one" style="background-image: url(<?php the_field('quote_bg_img'); ?>)"></div>
  <div class="quote__bg-two" style="background-image: url(<?php the_field('quote_bg_img'); ?>)"></div>
  <div class="quote__text"><?php  the_field('portfolio_quote'); ?></div>
</div>

<section id="contact-section" class="contact js-contact">
  <div class="contact__wrapper">
    <div class="contact__content">
      <div class="horiz-line"></div>
      <h1 class="contact__num">
        04
        <img src="<?php echo get_template_directory_uri() . '/images/forward_slash.png'; ?>" alt="">
      </h1>
      <h2 class="contact__heading"><?php the_field('contact_heading'); ?></h2>
      <p class="contact__text"><?php the_field('contact_text'); ?></p>
      <a href="<?php the_field('contact_resume_link'); ?>" class="contact__button">
        <?php the_field('contact_resume_text'); ?>
        <div class="shape"></div>
      </a>
      <p class="contact__date"><?php the_field('contact_date'); ?></p>
    </div>
    <div class="contact__info">
      <div class="contact__info__wrap">
        <div class="user-info email">
          <div class="user-info__text">E-mail</div>
          <div class="user-info__detail"><?php the_field('contact_email'); ?></div>
        </div>
        <div class="user-info">
          <div class="user-info__text">Skype</div>
          <div class="user-info__detail"><?php the_field('contact_skype'); ?></div>
        </div>
        <div class="user-info social">
          <div class="user-info__text">Social</div>
          <div class="social__icons">
            <ul class="social__list">
              <li class="social__item"><a href="<?php the_field('contact_behance'); ?>" class="social__link"><i class="fa fa-behance" aria-hidden="true"></i></a></li>
              <li class="social__item"><a href="<?php the_field('contact_linkedin'); ?>" class="social__link"><i class="fa fa-linkedin" aria-hidden="true"></i></a></li>
              <li class="social__item"><a href="<?php the_field('contact_dribbble'); ?>" class="social__link"><i class="fa fa-dribbble" aria-hidden="true"></i></a></li>
              <li class="social__item"><a href="<?php the_field('contact_twitter'); ?>" class="social__link"><i class="fa fa-twitter" aria-hidden="true"></i></a></li>
            </ul>
          </div>
        </div>
        <div class="user-info">
          <div class="user-info__text">Tel</div>
          <div class="user-info__detail"><?php the_field('contact_phone'); ?></div>
        </div>
      </div><!-- .contact__info__wrap -->
    </div><!-- .contact__info -->
  </div><!-- .contact__wrapper -->
</section>


<?php get_footer(); ?>