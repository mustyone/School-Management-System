<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$branch = strtoupper($branch);

$class_alternative_name = $section_shot_code.$class_numeric_name.$branch;

$query = "UPDATE classes SET class_numeric_name='$class_numeric_name',
section_id=$section_id,branch='$branch',class_alternative_name='$class_alternative_name',passing_average=$passing_average
 WHERE class_id = $class_id";

 try{
    $result = mysqli_query($dbc,$query);
    if(mysqli_affected_rows($dbc) > 0){
        $_SESSION['message'] = "{$class_alternative_name} has been updated successfully";
        header("location:/result/admin/allclasses");
    }
    else{
        $_SESSION['error'] = "Error updating class";
        header("location:/result/admin/editclass/$class_id");
    }

 }
 catch(\Exception $e){
    $_SESSION['error'] = "DB Error - ". $e->getMessage();
    header("location:/result/admin/editclass/$class_id");
 }


