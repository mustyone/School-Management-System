<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');

extract($_POST);

$subject_name = ucwords($subject_name);

$subject_code = "{$section_shot_code}_{$subject_name}";
$query = "INSERT INTO subjects(subject_name,subject_section_id,subject_branch,subject_code)
 VALUES ('$subject_name','$subject_section_id','$subject_branch','$subject_code')";


try{
    $result = mysqli_query($dbc,$query);
    if(mysqli_insert_id($dbc) !== 0){
        $_SESSION['message'] = "{$subject_name} has been added successfully";
        header("location:/result/admin/allsubjects");
    }
    else{
        $_SESSION['error'] = "Error adding subject";
        header("location:/result/admin/newsubject");
    }
    
}
catch(\Exception $e){
    /**@TODO log error to file */
    $_SESSION['error'] = "DB Error";
    header("location:/result/admin/newsubject");
}



