<?php

function extend_tag_cloud($tag_data)
{
  return array_map(function ($item) {
    $item["class"] .= " link-light";
    return $item;
  }, (array) $tag_data);
}
add_filter("wp_generate_tag_cloud_data", "extend_tag_cloud");
