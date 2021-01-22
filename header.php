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
	<meta charset="<?php bloginfo("charset"); ?>">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="profile" href="https://gmpg.org/xfn/11">

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
							<h1 class="site-title">🔗 <a class="link-light" href="<?php echo esc_url(home_url("/")); ?>" rel="home"><?php bloginfo("name"); ?></a></h1>
							<?php else: ?>
							<p class="site-title"><a class="link-light" href="<?php echo esc_url(home_url("/")); ?>" rel="home"><?php bloginfo("name"); ?></a></p>
							<?php endif;
     $link_manager_description = get_bloginfo("description", "display");
     if ($link_manager_description || is_customize_preview()): ?>
							<p class="site-description"><?php echo $link_manager_description;
       // phpcs:ignore WordPress.Security.EscapeOutput.OutputNotEscaped
       ?></p>
						<?php endif;
     ?>
				</div>
			</div>
		</div>
	</header><!-- #masthead -->
