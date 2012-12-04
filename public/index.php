<?php
define('ENV', substr($_SERVER['HTTP_HOST'], -4) === '.dev' ? 'development' : 'production');
define('PATH_ASSETS', 'assets/');
define('PATH_BLOG', 'blog/');
define('PATH_DIST', 'dist/');
define('PATH_VENDOR', 'vendor/');

require 'functions.php';
require 'version.php';

$route = @$_GET['route'];
$routes = array(
    'folio',
    'blog',
    'error'
);

if (!in_array($route, $routes))
{
    $route = $routes[0];
}

ob_start();

require $route . '.php';

$body = ob_get_contents();

ob_end_clean();

require 'header.php';

echo $body;

require 'footer.php';