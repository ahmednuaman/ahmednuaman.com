<?php
define('ENV', substr($_SERVER['HTTP_HOST'], -4) === '.dev' ? 'development' : 'production');
define('PATH_ASSETS', 'assets/');
define('PATH_DIST', 'dist/');
define('PATH_VENDOR', 'vendor/');

require 'functions.php';
require 'version.php';

require 'header.php';
?>

<?php
require 'footer.php';