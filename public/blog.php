<?php if (!defined('ENV')) { die('*sneaky sneaky*'); }

$title = 'The blog archieve, by Ahmed Nuaman';
$blog_entries = get_latest_blog_entries(5);
?>
<div id="header" class="row">
    <h1><span>Ahmed</span> <span>Nuaman</span></h1>
</div>
<div id="content" class="row">
    <div id="blog-entries" class="row">
        <?php foreach ($blog_entries as $blog_entry): ?>
            <article id="<?php echo $blog_entry->id; ?>" class="row blog-entry">
                <h3><?php echo $blog_entry->title; ?></h3>
                <div class="blog-entry-content">
                    <?php echo $blog_entry->post; ?>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</div>