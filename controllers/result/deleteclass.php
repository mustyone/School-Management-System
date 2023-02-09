<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$end_date = $_POST['end_date'];

$id = $_POST['class_id'];

$query = "DELETE FROM classes WHERE class_id=$id";

try{
    $result = mysqli_query($dbc, $query);


    if(mysqli_affected_rows($dbc) > 0){
        $_SESSION['message'] = "Class has been removed successfully";
        header("location:/result/admin/allclasses");
    }
    else{
        $_SESSION['error'] = "Class not removed";
        header("location:/result/admin/deleteclass/$id");
    }
    
}
catch(\Exception $e){
    //log error to file
    log_message($e->getMessage(), $e);

    $_SESSION['error'] = "DB Error";
    header("location:/result/admin/deleteclass/$id");
}
