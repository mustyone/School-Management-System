<?php
<<<<<<< HEAD
// error_reporting(0);
=======
//error_reporting(0);
>>>>>>> a047eee (updated migration)
require 'init.php';

require_once __DIR__.'/router.php';

$request = $_SERVER['REQUEST_URI'];
$curdir = dirname($_SERVER['REQUEST_URI']) . "/";
$baseUri = str_replace($curdir, '/', $curdir);

require __DIR__ . '/routes.php';

