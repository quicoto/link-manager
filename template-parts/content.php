<?php
/**
 * Template part for displaying posts
 *
 * @link https://developer.wordpress.org/themes/basics/template-hierarchy/
 *
 * @package link-manager
 */
?>

<article id="post-<?php the_ID(); ?>" <?php post_class(); ?>>
  <div class="card bg-dark mb-3">
    <?php if (get_the_title() !== "") { ?>
        <header class="card-header">
    <?php if (is_singular()):
      the_title('<h1 class="entry-title">', "</h1>");
    else:
      the_title('<h2 class="entry-title">', "</h2>");
    endif; ?>
        </header>
    <?php } ?>
    <div class="card-body">
      <div class="card-text">
        <?php
        the_content();
        echo getLinkUrl(get_the_ID());
        ?>
      </div>
    </div>
    <?php getLinkTags(get_the_ID()); ?>
  </div>
</article><!-- #post-<?php the_ID(); ?> -->
