<?php
//   /cbt/dashboard
$request = $_SERVER['REQUEST_URI'];
$exploded = explode("/", $request);

$module = $exploded[1];

if(!in_array($module,$_SESSION['allowedModules']) && $_SESSION['allowedModules'][0] !== "*")
{
    $_SESSION['warning'] = "You dont have access to {$module} module";
    header("Location: /modules");
}


if($_SESSION['allowedModules'][0] === "*") {}