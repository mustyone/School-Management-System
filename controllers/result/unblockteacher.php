<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');


$query = "UPDATE teachers SET teacher_login_status = 'active' WHERE teacher_id=$id";

try{
    
    $result = mysqli_query($dbc, $query);

    if(mysqli_affected_rows($dbc) > 0){
        $_SESSION['message'] = "Teacher account unblocked";
        header("location:/result/admin/teachers");
    }
    else{
        $_SESSION['error'] = "Could not unblock account";
        header("location:/result/admin/teachers");
    }
    
}
catch(\Exception $e){
    /**@TODO log error to file */

    $_SESSION['error'] = "DB Error";
    header("location:/result/admin/teachers");
}
