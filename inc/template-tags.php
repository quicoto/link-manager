<?php
/**
 * Custom template tags for this theme
 *
 * Eventually, some of the functionality here could be replaced by core features.
 *
 * @package link-manager
 */

if (!function_exists("link_manager_entry_footer")):
  /**
   * Prints HTML with meta information for the categories, tags and comments.
   */
  function link_manager_entry_footer()
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

    if (!is_single() && !post_password_required() && (comments_open() || get_comments_number())) {
      echo '<span class="comments-link">';
      comments_popup_link(
        sprintf(
          wp_kses(
            /* translators: %s: post title */
            __('Leave a Comment<span class="screen-reader-text"> on %s</span>', "link-manager"),
            [
              "span" => [
                "class" => [],
              ],
            ]
          ),
          wp_kses_post(get_the_title())
        )
      );
      echo "</span>";
    }

    edit_post_link(
      sprintf(
        wp_kses(
          /* translators: %s: Name of current post. Only visible to screen readers */
          __('Edit <span class="screen-reader-text">%s</span>', "link-manager"),
          [
            "span" => [
              "class" => [],
            ],
          ]
        ),
        wp_kses_post(get_the_title())
      ),
      '<span class="edit-link">',
      "</span>"
    );
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
      $html .= "<a href='{$tag_link}' title='{$tag->name} Tag' class='link-light'>";
      $html .= "{$tag->name}</a> ";
    }
  }
  $html .= "</div>";
  echo $html;
}

function getLinkUrl($post_id)
{
  $output = "";
  $url = get_post_meta($post_id, "url", true);

  if ($url) {
    $output = sprintf('➡️ <a class="link-light" href="%s" target="_blank" rel="nofollow noopener noreferrer">%s</a>', $url, $url);
  }

  return $output;
}
