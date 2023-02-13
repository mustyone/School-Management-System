<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$action = $_POST['action']; //up or down

$migrationFile = $_POST['migration'];

if(file_exists(APP_PATH. "/migrations/{$migrationFile}")){
    require APP_PATH . "/migrations/{$migrationFile}";

    $query = $action();

    try{
        $result = mysqli_multi_query($dbc, $query);
        $_SESSION['message'] = "Migration ran successfully";
        header("Location: /migration");
        
    }
    catch(Exception $e)
    {
        $_SESSION['error'] = "Error running migration: ".$e->getMessage();
        header("Location: /migration");
    }
  
}
else{
    $_SESSION['error'] = "File not found";
    header("Location: /migration");

}