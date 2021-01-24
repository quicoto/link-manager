<?php
/**
 * The template for displaying all single posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#single-post
 *
 * @package link-manager
 */

get_header(); ?>

	<main id="primary" class="container">
    <div class="row">
			<div class="col-12 col-md-8">

        <?php while (have_posts()):
          the_post();

          get_template_part("template-parts/content", get_post_type());
        endwhile;
// End of the loop.
?>
    </div>
    <?php get_sidebar(); ?>
	</main><!-- #main -->

<?php get_footer();
