<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$branch = strtoupper($branch);

$short_subject_name = strtoupper(substr($subject_name,0,3));
$subject_code = "{$section_shot_code}_{$short_subject_name}";

$query = "UPDATE subjects SET subject_name='$subject_name',
subject_branch='$branch',subject_section_id='$subject_section_id',subject_code='$subject_code'
 WHERE subject_id = $subject_id";

 try{
    $result = mysqli_query($dbc,$query);
    if(mysqli_affected_rows($dbc) > 0){
        $_SESSION['message'] = "Subject record has been updated successfully";
        header("location:/result/admin/allsubjects");
    }
    else{
        $_SESSION['error'] = "Error updating class";
        header("location:/result/admin/editsubject/$subject_id");
    }

 }
 catch(\Exception $e){
    /**@TODO log error to file */
    $_SESSION['error'] = "DB Error";
    header("location:/result/admin/editsubject/$subject_id");
 }


