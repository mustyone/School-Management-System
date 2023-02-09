<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$id = $_POST['teacher_id'];

$query = "DELETE FROM teachers WHERE teacher_id=$id";

try{
    
    $result = mysqli_query($dbc, $query);

    if(mysqli_affected_rows($dbc) > 0){
        $_SESSION['message'] = "Record has been removed successfully";
        header("location:/result/admin/teachers");
    }
    else{
        $_SESSION['error'] = "Record not removed";
        header("location:/result/admin/teachers");
    }
    
}
catch(\Exception $e){
    /**@TODO log error to file */

    $_SESSION['error'] = "DB Error";
    header("location:/result/admin/teachers");
}
