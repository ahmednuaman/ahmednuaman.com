<?php
require 'config.php';
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

if ($route === 'blog' && $is_feed === false)
{
    require 'header.php';

    echo $body;

    require 'footer.php';
}
else
{
    echo $body;
}