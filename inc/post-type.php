<?php

/**
 *
 * @see get_post_type_labels() for label keys.
 */
function linkmanager_postype_link_init()
{
  $labels = [
    "name" => _x("Links", "Post type general name", "textdomain"),
    "singular_name" => _x("Link", "Post type singular name", "textdomain"),
    "menu_name" => _x("Links", "Admin Menu text", "textdomain"),
    "name_admin_bar" => _x("Link", "Add New on Toolbar", "textdomain"),
    "add_new" => __("Add New", "textdomain"),
    "add_new_item" => __("Add New Link", "textdomain"),
    "new_item" => __("New Link", "textdomain"),
    "edit_item" => __("Edit Link", "textdomain"),
    "view_item" => __("View Link", "textdomain"),
    "all_items" => __("All Links", "textdomain"),
    "search_items" => __("Search Links", "textdomain"),
    "parent_item_colon" => __("Parent Links:", "textdomain"),
    "not_found" => __("No links found.", "textdomain"),
    "not_found_in_trash" => __("No links found in Trash.", "textdomain"),
    "featured_image" => _x("Link Cover Image", "Overrides the “Featured Image” phrase for this post type. Added in 4.3", "textdomain"),
    "set_featured_image" => _x("Set cover image", "Overrides the “Set featured image” phrase for this post type. Added in 4.3", "textdomain"),
    "remove_featured_image" => _x("Remove cover image", "Overrides the “Remove featured image” phrase for this post type. Added in 4.3", "textdomain"),
    "use_featured_image" => _x("Use as cover image", "Overrides the “Use as featured image” phrase for this post type. Added in 4.3", "textdomain"),
    "archives" => _x("Link archives", "The post type archive label used in nav menus. Default “Post Archives”. Added in 4.4", "textdomain"),
    "insert_into_item" => _x("Insert into book", "Overrides the “Insert into post”/”Insert into page” phrase (used when inserting media into a post). Added in 4.4", "textdomain"),
    "uploaded_to_this_item" => _x("Uploaded to this book", "Overrides the “Uploaded to this post”/”Uploaded to this page” phrase (used when viewing media attached to a post). Added in 4.4", "textdomain"),
    "filter_items_list" => _x("Filter links list", "Screen reader text for the filter links heading on the post type listing screen. Default “Filter posts list”/”Filter pages list”. Added in 4.4", "textdomain"),
    "items_list_navigation" => _x("Links list navigation", "Screen reader text for the pagination heading on the post type listing screen. Default “Posts list navigation”/”Pages list navigation”. Added in 4.4", "textdomain"),
    "items_list" => _x("Links list", "Screen reader text for the items list heading on the post type listing screen. Default “Posts list”/”Pages list”. Added in 4.4", "textdomain"),
  ];

  $args = [
    "labels" => $labels,
    "public" => true,
    "publicly_queryable" => true,
    "show_ui" => true,
    "show_in_menu" => true,
    "query_var" => true,
    "rewrite" => ["slug" => "link"],
    "capability_type" => "post",
    "has_archive" => true,
    "hierarchical" => false,
    "menu_position" => null,
    "menu_icon" => "dashicons-admin-links",
    "taxonomies" => ["post_tag"],
    "supports" => ["title", "editor", "author", "custom-fields"],
  ];

  register_post_type("link", $args);
}

add_action("init", "linkmanager_postype_link_init");

function linkmanager_add_custom_post_type_to_query($query)
{
  $query->set("post_type", ["link"]);
}
add_action("pre_get_posts", "linkmanager_add_custom_post_type_to_query");
