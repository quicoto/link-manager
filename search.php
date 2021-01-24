<?php
/**
 * The template for displaying search results pages
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/#search-result
 *
 * @package link-manager
 */

get_header(); ?>

	<main id="primary" class="container">
    <div class="row">
      <div class="col-12 col-md-8">
        <?php if (have_posts()): ?>
          <header class="page-header">
            <h1 class="page-title">
              <?php printf(esc_html__("Search Results for: %s", "link-manager"), "<em>" . get_search_query() . "</em>"); ?>
            </h1>
          </header><!-- .page-header -->

          <?php
          /* Start the Loop */
          while (have_posts()):
            the_post();

            /**
             * Run the loop for the search to output the results.
             * If you want to overload this in a child theme then include a file
             * called content-search.php and that will be used instead.
             */
            get_template_part("template-parts/content");
          endwhile;

          echo linkmanager_pagination();
          else:get_template_part("template-parts/content", "none");endif; ?>

      </div>
      <?php get_sidebar(); ?>
    </div>
	</main><!-- #main -->

<?php
get_sidebar();
get_footer();

