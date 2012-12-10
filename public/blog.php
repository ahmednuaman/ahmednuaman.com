<?php if (!defined('ENV')) { die('*sneaky sneaky*'); }

$title = 'The blog archieve, by Ahmed Nuaman';
$blog_entries = get_latest_blog_entries(10);
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