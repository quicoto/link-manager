<?php
/**
 * Template part for displaying a message that posts cannot be found
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package link-manager
 */
?>

<section class="no-results not-found">
	<header class="page-header">
		<h1 class="page-title"><?php esc_html_e("Nothing Found", "link-manager"); ?></h1>
	</header><!-- .page-header -->

	<div class="page-content">
  <?php if (is_search()): ?>
			<p>Sorry, but nothing links matched <em><?= $_GET["s"] ?></em>.</p>
  <?php else: ?>
			<p><?php esc_html_e("It seems we can't find any links. Perhaps create one first?", "link-manager"); ?></p>
	<?php endif; ?>
	</div><!-- .page-content -->
</section><!-- .no-results -->
