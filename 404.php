<?php
/**
 * The template for displaying 404 pages (not found)
 *
 * @link https://codex.wordpress.org/Creating_an_Error_404_Page
 *
 * @package link-manager
 */

get_header(); ?>

	<main id="primary" class="container">
		<div class="row">
			<div class="col-12 col-md-8">
				<section class="error-404 not-found row">
					<div class="col">
						<header class="page-header">
							<h1 class="page-title"><?php esc_html_e("Oops! That page can&rsquo;t be found.", "link-manager"); ?></h1>
						</header><!-- .page-header -->

						<div class="page-content">
							<p><?php esc_html_e("Hit the site name and get to the home", "link-manager"); ?></p>
						</div><!-- .page-content -->
					</div>
				</section><!-- .error-404 -->
			</div>
			<?php get_sidebar(); ?>
	</main><!-- #main -->

<?php
get_footer();

