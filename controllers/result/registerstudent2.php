<?php
include('../config/session.php');
include('../config/db.php');

    $admissionNumber = $_POST['admissionNum'];
    $session = $_POST['session_id'];
    $term = $_POST['term_id'];
    $class_id = $_POST['class_id'];

    foreach($admissionNumber as $student){
        $reg_id = $student.$session.$term;
        $query = "INSERT INTO registered_students(reg_id,class_id,reg_student_id,reg_session_id,reg_term) VALUES('$reg_id','$class_id','$student','$session','$term')";
        $result = mysqli_query($dbc,$query);
    }

    header("location:/pages/admin/registerstudents.php");