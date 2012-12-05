<?php if (!defined('ENV')) { die('*sneaky sneaky*'); }

$title = 'Ahmed Nuaman, the world famous dachshund tamer and freelance developer';
$work = get_work_entries();
?>
<div id="header" class="row">
    <h1><span>Ahmed</span> <span>Nuaman</span></h1>
    <ul id="hero">
        <?php foreach (array(
            'Wrestles dachshunds',
            'Problem solves',
            'Changes nappies',
            'Writes great code',
            'Relishes TTD',
            'Enjoys a bike ride',
            'Devours mexican food'
        ) as $value): ?>
        <li>
            <?php echo $value; ?>
        </li>
        <?php endforeach; ?>
    </ul>
</div>
<div id="content" class="row">
    <?php foreach ($work as $item): ?>
        <a href="http://<?php echo $item->link; ?>" title="<?php echo $item->title; ?>" style="background-image: url(<?php echo $item->thumb; ?>);">
            <span>
                <?php echo $item->title; ?>
            </span>
        </a>
    <?php endforeach; ?>
</div>