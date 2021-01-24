<?php

function linkmanager_enqueue_admin_script($hook)
{
  if ("post-new.php" === $hook || "post.php" === $hook) {
    wp_enqueue_script("my_custom_script", get_template_directory_uri() . "/js/admin.js", [], "1.0.0", true);
  }
}

add_action("admin_enqueue_scripts", "linkmanager_enqueue_admin_script");
