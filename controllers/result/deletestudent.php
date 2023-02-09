<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$id = $_POST['student_id'];

$query = "DELETE FROM students WHERE student_id=$id";

try{
    
    $result = mysqli_query($dbc, $query);

    if(mysqli_affected_rows($dbc) > 0){
        $_SESSION['message'] = "Record has been removed successfully";
        header("location:/result/admin/students");
    }
    else{
        $_SESSION['error'] = "Record not removed";
        header("location:/result/admin/students");
    }
    
}
catch(\Exception $e){
    /**@TODO log error to file */

    $_SESSION['error'] = "DB Error";
    header("location:/result/admin/students");
}
