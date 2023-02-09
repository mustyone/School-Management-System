<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$picture_path = "";
$query = "INSERT INTO students VALUES ('$student_admission_number','$first_name','$middle_name',
'$last_name','$class_id','active','$gender','$date_of_birth',0,'$picture_path')";

try{
    
    $result = mysqli_query($dbc,$query);

    if($result){
        $_SESSION['message'] = "Student record has been saved successfully";
        header("location:/result/admin/newstudent");
    }
    else{
        $_SESSION['error'] = "Error adding student";
        header("location:/result/admin/newstudent");
    }
    
    
}
catch(\Exception $e){
    $_SESSION['error'] = "DB Error".$e->getMessage(). "/". $query;
    header("location:/result/admin/newstudent");
}
