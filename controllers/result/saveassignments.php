<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');
extract($_POST);

$subjectTeachers = [];
foreach ($class_ids as $class_id) {
    $subjectTeacher[$class_id] = [];
    $subjectIDName = "{$class_id}_subject_ids";
    $subject_ids = $_POST[$subjectIDName];

    $teacherIDName = "{$class_id}_teacher_ids";

    $teacher_ids = $_POST[$teacherIDName];

    $subjectTeacher[$class_id] = array_combine($subject_ids, $teacher_ids);
}

array_push($subjectTeachers, $subjectTeacher);


if ($type === "assign") {

    $multiquery = "";

    foreach ($subjectTeachers[0] as $class_id => $subjectTeacher) {
        foreach ($subjectTeacher as $subject_id => $teacher_id) {
            $multiquery .= "INSERT INTO teacher_subjects(subject_id,teacher_id,class_id,session_id,term_id) 
                VALUES($subject_id,$teacher_id,$class_id,$session_id,$term_id);";
        }
    }

    try {
        $result = mysqli_multi_query($dbc, $multiquery);

        if ($result) {
            $_SESSION['message'] = "Record saved Successfully";
        } else {

            $_SESSION['error'] = "One or more records could not be saved";
        }
    } catch (Exception $e) {

        $_SESSION['error'] = "DB Error";
    }
}


if ($type === "show") {


    $multiquery = "";

    foreach ($subjectTeachers[0] as $class_id => $subjectTeacher) {
        foreach ($subjectTeacher as $subject_id => $teacher_subject_id) {
            $teacher_subject = explode("_",$teacher_subject_id);
            $multiquery .= "UPDATE teacher_subjects SET teacher_id = $teacher_subject[0] WHERE teacher_subject_id = $teacher_subject[1] ;";
        }
    }

    try {
        $result = mysqli_multi_query($dbc, $multiquery);

        if ($result) {
            $_SESSION['message'] = "Records updated Successfully";
        } else {

            $_SESSION['error'] = "One or more records could not be updated";
        }
    } catch (Exception $e) {

        $_SESSION['error'] = "DB Error";
    }
}


header("location:/result/admin/assignsubjects");
