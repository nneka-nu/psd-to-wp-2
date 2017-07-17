<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package webportfolio
 */

get_header( 'single-portfolio' ); ?>

	<main class="msg-404">
		<p class="content">Oops, page not found.</p>
		<a href="<?php echo esc_url( home_url( '/' ) ); ?>">Home</a>
	</main>

<?php
get_footer();
