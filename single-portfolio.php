<?php
/**
 * The template for displaying a single post for the postfolio post type
 */
get_header( 'single-portfolio' ); ?>
  <div class="portfolio-single">
    <div class="portfolio-single-wrap">
      <?php while ( have_posts() ) : the_post(); ?>
        <h1 class="portfolio-single__heading"><?php the_title(); ?></h1>
        <div class="portfolio-single__summary"><?php the_field( 'portfolio_summary' ); ?></div>
        <div class="portfolio-single__tags">
          <?php 
            $termsObj = get_the_terms( get_the_ID(), 'portfolio_categories' );
            $terms = array();

            foreach($termsObj as $term) :
              $terms[] = $term->name;
            endforeach;

            echo implode(', ', $terms);
          ?>
        </div>
        <figure class="portfolio-single__img-wrap">
          <?php the_post_thumbnail( 'single-portfolio' ); ?>
        </figure>
        <div class="portfolio-single__content-wrap">
          <div class="portfolio-single__video">
            <?php the_field( 'portfolio_video' ); ?>
            <div class="portfolio-single__caption"><?php the_field( 'portfolio_video_caption' ); ?></div>
            <ul class="portfolio-single__social">
              <li class="portfolio-single__social__item">
                <a href="<?php the_field('contact_behance', 15); ?>" class="portfolio-single__social__link"><i class="fa fa-behance" aria-hidden="true"></i></a>
              </li>
              <li class="portfolio-single__social__item">
                <a href="<?php the_field('contact_dribbble', 15); ?>" class="portfolio-single__social__link"><i class="fa fa-dribbble" aria-hidden="true"></i></a>
              </li>
              <li class="portfolio-single__social__item">
                <a title="Link to video" href="<?php the_field( 'portfolio_video_link' ); ?>" class="portfolio-single__social__link"><i class="fa fa-link" aria-hidden="true"></i></a>
              </li>
            </ul>
          </div>
          <div class="portfolio-single__text"><?php the_content(); ?></div>
        </div>
        
        <div class="portfolio-single__nav">
          <div class="portfolio-single__previous <?php echo get_previous_post() ? '' : 'hidden'; ?>">
              <a class="post-nav" href="<?php echo get_permalink( get_previous_post() ); ?>">
                <div class="text">Previous</div>
                <img class="arrow" src="<?php echo get_template_directory_uri() . '/images/prev_arrow.png'; ?>">
              </a>
          </div>
          <div class="portfolio-single__contact">
            <a class="contact-us" href="<?php echo 'mailto:' . get_field( 'contact_email', 15 ) . '?Subject=Hello%20again'; ?>"  target="_top">Contact Me</a>
          </div>
          <div class="portfolio-single__next">
            <?php if ( get_next_post() ) : ?>
              <a class="post-nav" href="<?php echo get_permalink( get_next_post() ); ?>">
                <div class="text">Next</div>
                <img class="arrow" src="<?php echo get_template_directory_uri() . '/images/next_arrow.png'; ?>">
              </a>
            <?php endif; ?>
          </div>
        </div>
      <?php endwhile; // End of the loop.?>
    </div><!-- .portfolio-single-wrap -->
  </div><!-- .portfolio-single -->
<?php
get_footer();
