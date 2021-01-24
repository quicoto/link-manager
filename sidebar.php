<?php
/**
 * The sidebar containing the main widget area
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package link-manager
 */

if (!is_active_sidebar("sidebar-1")) {
  return;
} ?>

<aside id="secondary" class="widget-area d-none d-sm-none d-md-block col-md-4">
  <?php dynamic_sidebar("sidebar-1"); ?>
</aside><!-- #secondary -->