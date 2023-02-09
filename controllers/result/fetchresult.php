<?php

include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$cat = $_GET['cat'] ?? 'current';

$result_type = "";

if(empty($student_id)){

    $result_type = "multiple";
    //get all students registered 
    $query1 = "SELECT * FROM registered_students WHERE class_id = $class_id AND reg_session_id = $session_id AND reg_term = $term_id";
    $result1 = mysqli_query($dbc, $query1);

    if(mysqli_num_rows($result1) >= 1){
        $record = [];

        while($students_row = mysqli_fetch_assoc($result1)){

            $query2 = "SELECT * FROM results 
            LEFT JOIN students ON results.result_student_id = students.student_id
            LEFT JOIN classes ON results.result_class_id = classes.class_id
            LEFT JOIN subjects ON results.result_subject_id = subjects.subject_id
            LEFT JOIN sessions ON results.result_session_id = sessions.session_id
            WHERE result_student_id = $students_row[reg_student_id]
            AND result_class_id = $class_id AND result_session_id = $session_id
            AND result_term = $term_id
            ";

            $result2 = mysqli_query($dbc, $query2);
            $record[$students_row['reg_student_id']] = [];

            while($row2 = mysqli_fetch_assoc($result2)){
                $record[$students_row['reg_student_id']][] = $row2;
            }
        }
    }

}
else{
    $result_type = "single";

    $query = "SELECT * FROM results 
    LEFT JOIN students ON results.result_student_id = students.student_id
    LEFT JOIN classes ON results.result_class_id = classes.class_id
    LEFT JOIN subjects ON results.result_subject_id = subjects.subject_id
    LEFT JOIN sessions ON results.result_session_id = sessions.session_id
    WHERE result_student_id = $student_id 
    AND result_class_id = $class_id AND result_session_id = $session_id
    AND result_term = $term_id
    ";



    $result = mysqli_query($dbc, $query);
    $record = [];
    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }

}

$_SESSION['result'] = $record;
$_SESSION['type'] = $result_type;

$location  = $cat == "current" ? "location:/result/admin/studentreport" : "location:/result/admin/studentreport";
header($location);
