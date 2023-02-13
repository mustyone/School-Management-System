<?php
include "db.php";
$request = $_SERVER['REQUEST_URI'];
$page = $_SERVER["SCRIPT_NAME"];
$route = preg_filter('/[0-9]/', "", $request) ?? $request;

//$request = $_SERVER['REQUEST_URI'];
//$exploded = explode("/", $request);
//$end = end($exploded);
//$path = is_numeric($end) || ctype_alnum($end) ? prev($exploded) : $end;
//$path = strlen($path) === 0 ? $end : $path;

switch ($route) {
    case "/migration":
        //fetch all the list of migrations
        $migrations = scandir(APP_PATH."/migrations");

        $migrationFiles = [];

        foreach($migrations as $migration){
            if(str_ends_with($migration, ".php")){
                $formattedFiles = explode("_", $migration);
                $formattedFiles = array_splice($formattedFiles,2, count($formattedFiles) - 5);

                $formattedFileName = implode(" ",$formattedFiles);
                $formattedFileName = ucfirst($formattedFileName);
                
                
                $migrationFiles[$migration] = $formattedFileName; 
                
            }
        }

        break;
    case "/modules":
        $modules = [
            'cbt' => [
                'icon' => 'fa fa-computer fa-7x',
                'url' => '/cbt/dashboard',
                'title' => 'CBT'

            ],
            'result' => [
                'icon' => 'fa fa-file-lines fa-7x',
                'url' => $_SESSION['userIsTeacher'] ? '/result/teacher/dashboard' : '/result/admin/dashboard',
                'title' => 'Result'

            ],
            'admission' => [
                'icon' => 'fa fa-book fa-7x',
                'url' => '/admission/dashboard',
                'title' => 'Admission'

            ],
            'finance' => [
                'icon' => 'fa fa-money-bill fa-7x',
                'url' => '/finance/dashboard',
                'title' => 'Finance'

            ],
            'bursary' => [
                'icon' => 'fa fa-money-check fa-7x',
                'url' => '/bursary/dashboard',
                'title' => 'Bursary'

            ],
            'health' => [
                'icon' => 'fa fa-hospital fa-7x',
                'url' => '/hospital/dashboard',
                'title' => 'Hospital'

            ],
            'admin' => [
                'icon' => 'fa fa-user-tie fa-7x',
                'url' => '/admin/dashboard',
                'title' => 'Admin Office'

            ],
            'app' => [
                'icon' => 'fa fa-database fa-7x',
                'url' => '/app/dashboard',
                'title' => 'Database'

            ],
            'shop' => [
                'icon' => 'fa fa-shop fa-7x',
                'url' => '/shop/dashboard',
                'title' => 'Shop'

            ],
            'library' => [
                'icon' => 'fa fa-book-dead fa-7x',
                'url' => '/admission/dashboard',
                'title' => 'Library'

            ],
            'report' => [
                'icon' => 'fa fa-money-bill-trend-up fa-7x',
                'url' => '/admission/dashboard',
                'title' => 'Reports'

            ],
            'student' =>[
                'icon' => 'fa fa-user-graduate fa-7x',
                'url' => '/student/dashboard',
                'title' => 'Student'

            ],
            'teacher' => [
                'icon' => 'fa fa-user-alt fa-7x',
                'url' => '/teacher/dashboard',
                'title' => 'Teacher'
            ]
        ];
        break;


}

//check the module config folder and load any moduleconfig for the user
$modulesConfig = scandir(APP_PATH . "/moduleconfig/");
$modulesConfig = array_slice($modulesConfig, 2);
foreach($modulesConfig as $moduleConfig)
{
    $path = APP_PATH . "/moduleconfig/{$moduleConfig}";

    $moduleName = explode(".",$moduleConfig)[0];
    if(in_array($moduleName, $_SESSION['allowedModules'] ?? [] ) ){
        include $path;
    }
    if($_SESSION['allowedModules'][0] === "*")
    {
        include $path;

    }
}
