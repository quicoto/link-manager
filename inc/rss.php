<?php

// Add links to rss feed
function linkmanger_add_to_custom_feed($qv)
{
  if (isset($qv["feed"]) && !isset($qv["post_type"])) {
    $qv["post_type"] = ["link"];
  }
  return $qv;
}
add_filter("request", "linkmanger_add_to_custom_feed");

function linkmanager_feed_content()
{
  require get_template_directory() . "/template-parts/rss.php";
}

function linkmanager_add_feed()
{
  add_feed("links", "linkmanager_feed_content");
}
add_action("init", "linkmanager_add_feed");

function encode_content_for_feed($content)
{
  $content = str_replace("]]>", "]]&gt;", $content);

  return apply_filters("the_content_feed", $content, "rss2");
}
