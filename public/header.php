<?php if (!defined('ENV')) { die('*sneaky sneaky*'); } ?>
<!DOCTYPE html>
<html class="no-js">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge,chrome=1" />
        <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, maximum-scale=1.0, minimum-scale=1.0" />
        <?php if (ENV === 'production'): ?>
            <link rel="stylesheet" href="/<?php echo PATH_ASSETS; ?>css/<?php echo PATH_DIST; ?>packaged-min.css?<?php echo VERSION; ?>" />
        <?php else: ?>
            <?php get_assets('css', '<link rel="stylesheet" href="%s?' . VERSION . '" />'); ?>
        <?php endif; ?>
        <title>
            <?php echo $title; ?>
        </title>
    </head>
    <body class="<?php echo $route; ?>">
        <div id="container" class="relative">