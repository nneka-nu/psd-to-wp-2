<?php 
  /* Template Name: Home Page */ 

get_header('home'); ?>

  <main class="home-content" role="main">
			<?php
			while ( have_posts() ) : the_post();

				get_template_part( 'template-parts/content', 'home' );

			endwhile; // End of the loop.
			?>
  </main><!-- #main -->