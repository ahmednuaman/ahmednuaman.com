<?php if (!defined('ENV')) { die('*sneaky sneaky*'); }

$blog_entry_name = @$_GET['blog'];
$is_feed = ($blog_entry_name === 'feed');

if (!$blog_entry_name || $is_feed)
{
    $title = 'The blog archieve, by Ahmed Nuaman';
    $blog_entries = get_latest_blog_entries(10);

    if (!$blog_entry_name && !$is_feed)
    {
        ?>
        <div id="header" class="row">
            <h1><span>Ahmed</span> <span>Nuaman</span></h1>
        </div>
        <div id="content" class="row">
            <h2>Blog archieve</h2>
            <ul id="blog-entries" class="row">
                <?php foreach ($blog_entries as $blog_entry): ?>
                    <li id="<?php echo $blog_entry->id; ?>" class="blog-entry span2">
                        <a href="<?php echo $blog_entry->link; ?>" title="<?php echo $blog_entry->title; ?>">
                            <h3><?php echo $blog_entry->title; ?></h3>
                            <span class="blog-entry-preview">
                                <?php echo substr(strip_tags($blog_entry->post), 0, 100); ?> ...
                            </span>
                        </a>
                    </li>
                <?php endforeach; ?>
            </ul>
        </div>
        <?php
    }
    else
    {
        ?>
            <?php echo '<?xml version="1.0" encoding="ISO-8859-1"?>'; ?>
            <rss version="2.0">
                <channel>
                    <title><?php echo $title; ?></title>
                    <link>http://www.ahmednuaman.com/blog/</link>
                    <description><?php echo $title; ?></description>
                    <?php foreach ($blog_entries as $blog_entry): ?>
                        <item>
                            <title><?php echo $blog_entry->title; ?></title>
                            <description><![CDATA[<?php echo $blog_entry->post; ?>]]></description>
                            <link>http://www.ahmednuaman.com/<?php echo $blog_entry->link; ?></link>
                            <pubDate><?php echo $blog_entry->timestamp; ?></pubDate>
                        </item>
                    <?php endforeach; ?>
                </channel>
            </rss>
        <?php
    }
}
else
{
    $blog_entry = get_blog_entry($blog_entry_name);
    $title = $blog_entry->title . ', by Ahmed Nuaman';
    ?>
    <div id="header" class="row">
        <h1><span>Ahmed</span> <span>Nuaman</span></h1>
    </div>
    <div id="content" class="blog-entry row">
        <h2><?php echo $blog_entry->title; ?></h2>
        <div class="blog-entry-content">
            <?php echo $blog_entry->post; ?>
        </div>
    </div>
    <?php
}