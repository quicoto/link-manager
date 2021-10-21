<?php
/**
 * RSS2 Feed Template for displaying RSS2 Posts feed.
 *
 * @package WordPress
 */

header("Content-Type: " . feed_content_type("rss2") . "; charset=" . get_option("blog_charset"), true);
$more = 1;

echo '<?xml version="1.0" encoding="' . get_option("blog_charset") . '"?' . ">";

/**
 * Fires between the xml and rss tags in a feed.
 *
 * @since 4.0.0
 *
 * @param string $context Type of feed. Possible values include 'rss2', 'rss2-comments',
 *                        'rdf', 'atom', and 'atom-comments'.
 */
do_action("rss_tag_pre", "rss2");
?>
<rss version="2.0"
	xmlns:content="http://purl.org/rss/1.0/modules/content/"
	xmlns:wfw="http://wellformedweb.org/CommentAPI/"
	xmlns:dc="http://purl.org/dc/elements/1.1/"
	xmlns:atom="http://www.w3.org/2005/Atom"
	xmlns:sy="http://purl.org/rss/1.0/modules/syndication/"
	xmlns:slash="http://purl.org/rss/1.0/modules/slash/"
	<?php /**
  * Fires at the end of the RSS root to add namespaces.
  *
  * @since 2.0.0
  */
 do_action("rss2_ns"); ?>
>

<channel>
	<title><?php wp_title_rss(); ?></title>
	<atom:link href="<?php self_link(); ?>" rel="self" type="application/rss+xml" />
	<link><?php bloginfo_rss("url"); ?></link>
	<description><?php bloginfo_rss("description"); ?></description>
	<lastBuildDate><?php echo get_feed_build_date("r"); ?></lastBuildDate>
	<language><?php bloginfo_rss("language"); ?></language>
	<sy:updatePeriod>
	<?php
 $duration = "hourly";

 /**
  * Filters how often to update the RSS feed.
  *
  * @since 2.1.0
  *
  * @param string $duration The update period. Accepts 'hourly', 'daily', 'weekly', 'monthly',
  *                         'yearly'. Default 'hourly'.
  */
 echo apply_filters("rss_update_period", $duration);
 ?>
	</sy:updatePeriod>
	<sy:updateFrequency>
	<?php
 $frequency = "1";

 /**
  * Filters the RSS update frequency.
  *
  * @since 2.1.0
  *
  * @param string $frequency An integer passed as a string representing the frequency
  *                          of RSS updates within the update period. Default '1'.
  */
 echo apply_filters("rss_update_frequency", $frequency);
 ?>
	</sy:updateFrequency>
	<?php
 /**
  * Fires at the end of the RSS2 Feed Header.
  *
  * @since 2.0.0
  */
 do_action("rss2_head");

 while (have_posts()):
   the_post(); ?>
	<item>
		<title><?php the_title_rss(); ?></title>
		<link><?php echo getLinkURL(get_the_ID()); ?></link>

		<dc:creator><![CDATA[<?php the_author(); ?>]]></dc:creator>
		<pubDate><?php echo mysql2date("D, d M Y H:i:s +0000", get_post_time("Y-m-d H:i:s", true), false); ?></pubDate>
		<?php the_category_rss("rss2"); ?>
		<guid isPermaLink="false"><?php the_guid(); ?></guid>

    <?php
    $content = get_the_content();

    $description = "";
    if ($content !== "") {
      $description .= $content;
      $description .= "\n";
      $description .= "\n";
    }
    if (html_entity_decode(get_the_title_rss()) === "") {
      $description .= '"' . html_entity_decode(get_the_title_rss()) . '"';
      $description .= "\n";
      $description .= "\n";
    }
    $description .= linkmanager_arrow_emoji() . " " . getLinkURL(get_the_ID());
    $description .= "\n";
    $description .= "\n";
    $description .= getLinkTagsRSS(get_the_ID(), true);
    ?>
    <description><![CDATA[<?php echo $content; ?>]]></description>
    <content:encoded><![CDATA[<?php echo $description; ?>]]></content:encoded>

		<?php rss_enclosure(); ?>

		<?php /**
   * Fires at the end of each RSS2 feed item.
   *
   * @since 2.0.0
   */
  do_action("rss2_item"); ?>
	</item>
	<?php
 endwhile;
 ?>
</channel>
</rss>
