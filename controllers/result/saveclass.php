<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$branch = strtoupper($branch);

$class_alternative_name = $section_shot_code.$class_numeric_name.$branch;

$query = "INSERT INTO classes(class_numeric_name,section_id,branch,class_alternative_name,passing_average)
 VALUES ('$class_numeric_name','$section_id','$branch','$class_alternative_name',$passing_average)";

 try{
    $result = mysqli_query($dbc,$query);
    if(mysqli_insert_id($dbc) !== 0){
        $_SESSION['message'] = "{$class_alternative_name} has been added successfully";
        header("location:/result/admin/allclasses");
    }
    else{
        $_SESSION['error'] = "Error adding class";
        header("location:/result/admin/newclass");
    }

 }
 catch(\Exception $e){
    $_SESSION['error'] = "DB Exception - ". $e->getMessage();
    header("location:/result/admin/newclass");
 }


