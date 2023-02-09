<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$id = $_POST['test_id'];

$query = "DELETE FROM tests WHERE test_id=$id";

try{
    $result = mysqli_query($dbc, $query);


    if(mysqli_affected_rows($dbc) > 0){
        $_SESSION['message'] = "Assesment record has been removed successfully";
        header("location:/result/admin/allassesments");
    }
    else{
        $_SESSION['error'] = "Assesment record not removed";
        header("location:/result/admin/deleteassesment/$id");
    }
    
}
catch(\Exception $e){
    /**@TODO log error to file */

    $_SESSION['error'] = "DB Error";
    header("location:/result/admin/deleteassesment/$id");
}
