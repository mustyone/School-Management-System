<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$id = $_POST['subject_id'];

$query = "DELETE FROM subjects WHERE subject_id=$id";

try{
    $result = mysqli_query($dbc, $query);


    if(mysqli_affected_rows($dbc) > 0){
        $_SESSION['message'] = "Subject has been removed successfully";
        header("location:/result/admin/allsubjects");
    }
    else{
        $_SESSION['error'] = "Subject not removed";
        header("location:/result/admin/deletesubject/$id");
    }
    
}
catch(\Exception $e){
    /**@TODO log error to file */

    $_SESSION['error'] = "DB Error";
    header("location:/result/admin/deletesubject/$id");
}
