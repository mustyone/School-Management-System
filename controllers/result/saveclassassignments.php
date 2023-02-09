<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');
extract($_POST);

$classTeachers = array_combine($class_ids, $teacher_ids);



if ($type === "assign") {

    $multiquery = "";


    foreach ($classTeachers as $class_id => $teacher_id) {
        $multiquery .= "INSERT INTO class_teachers(teacher_id,class_id,session_id) 
                VALUES($teacher_id,$class_id,$session_id);";
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


    foreach ($classTeachers as $class_id => $class_teacher_id) {
        $teacher = explode("_", $class_teacher_id);
        $multiquery .= "UPDATE class_teachers SET teacher_id = $teacher[0] WHERE id = $teacher[1]; ";
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


header("location:/result/admin/assignclassteacher");
