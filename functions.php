<?php
/**
 * link-manager functions and definitions
 *
 * @link https://developer.wordpress.org/themes/basics/theme-functions/
 *
 * @package link-manager
 */

if (!defined("_S_VERSION")) {
  $theme_version = "1.4.1";

  // Replace the version number of the theme on each release.
  define("_S_VERSION", $theme_version);
}

if (!function_exists("linkmanager_setup")):
  /**
   * Sets up theme defaults and registers support for various WordPress features.
   *
   * Note that this function is hooked into the after_setup_theme hook, which
   * runs before the init hook. The init hook is too late for some features, such
   * as indicating support for post thumbnails.
   */
  function linkmanager_setup()
  {
    /*
     * Make theme available for translation.
     * Translations can be filed in the /languages/ directory.
     * If you're building a theme based on link-manager, use a find and replace
     * to change 'link-manager' to the name of your theme in all the template files.
     */
    load_theme_textdomain("link-manager", get_template_directory() . "/languages");

    function linkmanager_widgets_init()
    {
      register_sidebar([
        "name" => esc_html__("Sidebar", "test"),
        "id" => "sidebar-1",
        "description" => esc_html__("Add widgets here.", "test"),
        "before_widget" => '<section id="%1$s" class="widget %2$s mb-3">',
        "after_widget" => "</section>",
        "before_title" => '<h3 class="widget-title">',
        "after_title" => "</h3>",
      ]);
    }
    add_action("widgets_init", "linkmanager_widgets_init");

    /*
     * Let WordPress manage the document title.
     * By adding theme support, we declare that this theme does not use a
     * hard-coded <title> tag in the document head, and expect WordPress to
     * provide it for us.
     */
    add_theme_support("title-tag");

    // This theme uses wp_nav_menu() in one location.
    register_nav_menus([
      "menu-1" => esc_html__("Primary", "link-manager"),
    ]);

    add_theme_support("html5", ["search-form"]);

    // Set up the WordPress core custom background feature.
    add_theme_support(
      "custom-background",
      apply_filters("linkmanager_custom_background_args", [
        "default-color" => "ffffff",
        "default-image" => "",
      ])
    );

    // Add theme support for selective refresh for widgets.
    add_theme_support("customize-selective-refresh-widgets");
  }
endif;
add_action("after_setup_theme", "linkmanager_setup");

/**
 * Enqueue scripts and styles.
 */
function linkmanager_scripts()
{
  wp_enqueue_style("linkmanager-style", get_stylesheet_uri(), [], _S_VERSION);
}
add_action("wp_enqueue_scripts", "linkmanager_scripts");

function linkmanager_enqueue_admin_script($hook)
{
  if ("post-new.php" === $hook || "post.php" === $hook) {
    wp_enqueue_script("my_custom_script", get_template_directory_uri() . "/admin.min.js", array(), _S_VERSION, true);
  }
}

add_action("admin_enqueue_scripts", "linkmanager_enqueue_admin_script");


function linkmanager_deregister_scripts()
{
  wp_deregister_script("wp-embed");
}
add_action("wp_footer", "linkmanager_deregister_scripts");

function linkmanager_arrow_emoji()
{
  return "➡️";
}

/**
 * Register Link post-type
 */
require get_template_directory() . "/inc/post-type.php";

/**
 * Custom template tags for this theme.
 */
require get_template_directory() . "/inc/template-tags.php";

/**
 * Functions which enhance the theme by hooking into WordPress.
 */
require get_template_directory() . "/inc/template-functions.php";

/**
 * RSS Feed
 */
require get_template_directory() . "/inc/rss.php";

/**
 * Admin
 */
require get_template_directory() . "/inc/admin.php";
