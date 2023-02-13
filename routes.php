<?php
require "routes/ResultRoutes.php";
require "routes/CbtRoutes.php";
require "routes/AdmissionRoutes.php";

get('/', 'views/landing/index');
get('/modules', 'views/landing/home');


any('/404','views/404.php');
