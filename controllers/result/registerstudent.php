<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');

$admissionNumbers = $_POST['student_ids'] ?? [];
$session_id  = $_POST['session_id'];
$term_id = $_POST['term_id'];
$class_id = $_POST['class_id'];
// $class_teacher_id = $_POST['class_teacher_id'];

$numberOfStudents = count($admissionNumbers);

if($numberOfStudents <= 0){
    $_SESSION['warning'] = "No student selected. You have to check at least 1 student to be registered";
    header("location:/result/admin/registerstudent");
}

$multiquery = "";
foreach ($admissionNumbers as $student_id) {
    $reg_id = "{$student_id}{$session_id}{$term_id}";
    $multiquery .= "INSERT INTO registered_students(reg_id,class_id,reg_student_id,reg_session_id,reg_term) 
    VALUES('$reg_id','$class_id','$student_id','$session_id','$term_id');";
}

try{
    $result = mysqli_multi_query($dbc, $multiquery);
    if($result === false){
        $_SESSION['error'] = "DB Error";
        header("location:/result/admin/registerstudent");

    }
    else{
        $_SESSION['message'] = count($admissionNumbers) . " students registered successfully";
        header("location:/result/admin/registerstudent");
    }
}
catch(\Exception $d){
    $_SESSION['error'] = "DB Error";
    header("location:/result/admin/registerstudent");

}

