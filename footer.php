<?php
/**
 * The template for displaying the main footer
 *
 * Contains the closing of the .wrapper div and all content after.
 */

?>

	<footer class="footer" style="background-image: url(<?php the_field('footer_bg_img', 15); ?>)">
		<div class="footer__wrap">
      <p class="logo footer__logo">
        <img class="footer__logo__img" src="<?php the_field('site_logo', 15); ?>" alt="Logo">
      </p>
      <div class="footer__text"><?php the_field('footer_text', 15); ?></div>
		</div>
	</footer>
</div><!-- .wrapper -->

<?php wp_footer(); ?>

</body>
</html>