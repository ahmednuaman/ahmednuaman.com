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
    <div id="work" class="row">
        <?php foreach ($work as $item): ?>
            <a href="http://<?php echo $item->link; ?>" title="<?php echo $item->title; ?>" class="span2" style="background-image: url(<?php echo $item->thumb; ?>);">
                <span>
                    <?php echo $item->title; ?>
                </span>
            </a>
        <?php endforeach; ?>
    </div>
    <div id="bio" class="row">
        <div class="span2">
            <p>
                I'm Ahmed, a freelance developer and designer. I graduated from Ravensbourne College in 2007 with a 1st class degree in Interaction Design. Since then I've worked for small and large agencies and clients including Google and YouTube, BBH, Unilever, Samsung, Johnson &amp; Johnson, TUI, BBC, and many more.
            </p>
            <p>
                I'm a firm believer in writing code with DRY, MVC, and TDD principles in mind, even if it's a small single-page app or large content-driven site.
            </p>
        </div>
        <div class="span2">
            <p>
                My core development skills are in...
            </p>
            <ul>
                <li>
                    <strong>Backend:</strong>
                    Python, PHP, and NodeJS
                </li>
                <li>
                    <strong>Front end:</strong>
                    HTML5 (Canvas, CSS3, etc...), JavaScript, and AS3
                </li>
                <li>
                    <strong>Platforms and systems:</strong>
                    Google App Engine, Heroku, Django, WordPress, CodeIgniter, Mocha TDD, Backbone, and PureMVC
                </li>
            </ul>
        </div>
    </div>
</div>