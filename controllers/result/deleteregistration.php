<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$id = $_POST['reg_id'];

$query = "DELETE FROM registered_students WHERE reg_id=$id";

try{
    
    $result = mysqli_query($dbc, $query);

    if(mysqli_affected_rows($dbc) > 0){
        $_SESSION['message'] = "Record has been removed successfully";
        header("location:/result/admin/registerstudent");
    }
    else{
        $_SESSION['error'] = "Record not removed";
        header("location:/result/admin/registerstudent");
    }
    
}
catch(\Exception $e){
    /**@TODO log error to file */

    $_SESSION['error'] = "DB Error";
    header("location:/result/admin/registerstudent");
}
