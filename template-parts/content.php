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
    <?php if (is_singular()): ?>
      <h1><?= get_the_title() ?></h1>
    <?php else: ?>
      <h2 class="h4 mb-0 float-start"><?= get_the_title() ?></h2>
    <?php endif; ?>
    <?php if (get_edit_post_link()) {?>
        <a class="float-end" href="<?=get_edit_post_link()?>" style="transform: rotateY(
180deg);">✏️</a>
    <?php } ?>
        </header>
    <?php } ?>
    <div class="card-body">
      <div class="card-text">
        <?php
        the_content();
        echo getLinkHTML(get_the_ID());
        ?>
      </div>
    </div>
    <footer class="card-footer text-muted container">
      <div class="row">
        <div class="col-12 col-md-8"><?php getLinkTags(get_the_ID()); ?></div>
        <div class="col-12 col-md-4 text-md-end" title="<?php echo get_the_date(); ?>"><?php echo wp_relative_date(); ?></div>
      </div>
    </div>
</article><!-- #post-<?php the_ID(); ?> -->
