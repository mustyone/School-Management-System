<?php
require "routes/ResultRoutes.php";
require "routes/CbtRoutes.php";

get('/', 'views/landing/index');
get('/modules', 'views/landing/home');


any('/404','views/404.php');
