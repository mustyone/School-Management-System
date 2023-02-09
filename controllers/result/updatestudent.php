<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$picture_path = "";
$query = "UPDATE students SET student_first_name = '$first_name', student_middle_name = '$middle_name',
student_last_name = '$last_name', student_class_id = $class_id, student_status='$student_status',
gender='$gender',date_of_birth='$date_of_birth',house_id = 0, photo = '$picture_path' WHERE student_id = $student_id
";


try{
    
    $result = mysqli_query($dbc,$query);

    if($result){
        $_SESSION['message'] = "Student record has been udpated successfully";
        header("location:/result/admin/editstudent/{$student_id}");
    }
    else{
        $_SESSION['error'] = "Error updating student";
        header("location:/result/admin/editstudent/{$student_id}");
    }
    
    
}
catch(\Exception $e){
    $_SESSION['error'] = "DB Error" . $e->getMessage();
    header("location:/result/admin/editstudent/{$student_id}");
}
