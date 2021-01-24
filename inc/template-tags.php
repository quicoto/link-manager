<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package link-manager
 */

if (!function_exists("linkmanager_entry_footer")):
  function linkmanager_entry_footer()
  {
    // Hide category and tag text for pages.
    if ("post" === get_post_type()) {
      /* translators: used between list items, there is a space after the comma */
      $categories_list = get_the_category_list(esc_html__(", ", "link-manager"));
      if ($categories_list) {
        /* translators: 1: list of categories. */
        printf('<span class="cat-links">' . esc_html__('Posted in %1$s', "link-manager") . "</span>", $categories_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
      }

      /* translators: used between list items, there is a space after the comma */
      $tags_list = get_the_tag_list("", esc_html_x(", ", "list item separator", "link-manager"));
      if ($tags_list) {
        /* translators: 1: list of tags. */
        printf('<span class="tags-links">' . esc_html__('Tagged %1$s', "link-manager") . "</span>", $tags_list); // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
      }
    }
  }
endif;

if (!function_exists("wp_body_open")):
  /**
   * Shim for sites older than 5.2.
   *
   * @link https://core.trac.wordpress.org/ticket/12563
   */
  function wp_body_open()
  {
    do_action("wp_body_open");
  }
endif;

// Relative date & time
function wp_relative_date()
{
  return human_time_diff(get_the_time("U"), current_time("timestamp")) . " ago";
}
add_filter("get_the_date", "wp_relative_date"); // for posts

function getLinkTags($post_id)
{
  $tags = wp_get_post_tags($post_id);
  $html = '<div class="mb-1 mb-md-0">';
  if (count($tags) > 0) {
    $html .= "Tags: ";
    foreach ($tags as $tag) {
      $tag_link = get_tag_link($tag->term_id);
      $html .= "<a href='{$tag_link}' title='{$tag->name} Tag'>";
      $html .= "{$tag->name}</a> ";
    }
  }
  $html .= "</div>";
  echo $html;
}

function getLinkTagsRSS($post_id)
{
  $tags = wp_get_post_tags($post_id);
  $output = "";
  if (count($tags) > 0) {
    foreach ($tags as $tag) {
      $output .= "#{$tag->name} ";
    }
  }
  return $output;
}

function getLinkHTML($post_id)
{
  $output = "";
  $url = get_post_meta($post_id, "url", true);

  if ($url) {
    $output = sprintf(linkmanager_arrow_emoji() . ' <a href="%s" target="_blank" rel="nofollow noopener noreferrer">%s</a>', $url, $url);
  }

  return $output;
}

function getLinkURL($post_id)
{
  return $url = get_post_meta($post_id, "url", true);
}

function linkmanager_pagination()
{
  $navigation = "<section class='row'>";

  $navigation .= "<div class='col'>";
  $navigation .= get_next_posts_link("⏪ Earlier");
  $navigation .= "</div>";
  $navigation .= "<div class='col text-end'>";
  $navigation .= get_previous_posts_link("Later ⏩");
  $navigation .= "</div>";

  $navigation .= "</section>";

  return $navigation;
}
