<?php
$script_name = substr($_SERVER['SCRIPT_NAME'], 1);

if ($script_name !== 'index.php' && $script_name !== 'feed.php')
{
    die('*sneaky sneaky*');
}

define('ENV', substr($_SERVER['HTTP_HOST'], -4) === '.dev' ? 'development' : 'production');
define('PATH_ASSETS', 'assets/');
define('PATH_BLOG', 'blog/');
define('PATH_DIST', 'dist/');
define('PATH_VENDOR', 'vendor/');