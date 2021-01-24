<?php
/**
 * The header for our theme
 *
 * This is the template that displays all of the <head> section and everything up until <div id="content">
 *
 * @link https://developer.wordpress.org/themes/basics/template-files/#template-partials
 *
 * @package link-manager
 */
?>
<!doctype html>
<html <?php language_attributes(); ?>>
<head>

	<link rel="alternate" type="application/rss+xml" title="<?php bloginfo("name"); ?> Feed" href="<?php bloginfo("url"); ?>?feed=rss2" />
	<meta charset="<?php bloginfo("charset"); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

	<link rel="apple-touch-icon" sizes="180x180" href="<?= get_stylesheet_directory_uri() ?>/assets/apple-touch-icon.png">
	<link rel="icon" type="image/png" sizes="32x32" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon-32x32.png">
	<link rel="icon" type="image/png" sizes="16x16" href="<?= get_stylesheet_directory_uri() ?>/assets/favicon-16x16.png">
	<link rel="manifest" href="<?= get_stylesheet_directory_uri() ?>/assets/site.webmanifest">
	<link rel="mask-icon" href="<?= get_stylesheet_directory_uri() ?>/assets/safari-pinned-tab.svg" color="#5bbad5">
	<meta name="msapplication-TileColor" content="#da532c">
	<meta name="theme-color" content="#3a444e">

	<?php wp_head(); ?>
</head>

<body <?php body_class(); ?>>
<?php wp_body_open(); ?>
<div id="page" class="site">
	<header id="masthead" class="site-header bg-dark mb-3">
		<div class="container">
			<div class="row">
				<div class="col pt-3 pb-3">
					<?php
     if (is_front_page() && is_home()): ?>
							<h1 class="site-title mb-0">🔗 <a href="<?php echo esc_url(home_url("/")); ?>" rel="home"><?php bloginfo("name"); ?></a></h1>
					<?php else: ?>
							<p class="site-title h1">🔗 <a href="<?php echo esc_url(home_url("/")); ?>" rel="home"><?php bloginfo("name"); ?></a></p>
					<?php endif;
     $linkmanager_description = get_bloginfo("description", "display");
     if ($linkmanager_description || is_customize_preview()): ?>
							<p class="site-description"><?php echo $linkmanager_description;
       // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
       ?></p>
						<?php endif;
     ?>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
