<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');
extract($_POST);

$teachers = getTeachers();
$classes = getSectionClasses($section_id);

if ($type === "assign") {

    $_SESSION['data'] = [
        'teachers' => $teachers,
        'classes' => $classes,
        'section_id' => $section_id,
        'session_id' => $session_id,
        'type' => $type
    ];
}


if ($type === "show") {

    $classTeachers = [];

    foreach ($classes as $class) {
        $query = "SELECT * FROM class_teachers 
            LEFT JOIN teachers ON class_teachers.teacher_id = teachers.teacher_id
            LEFT JOIN classes ON class_teachers.class_id =  classes.class_id
            WHERE class_teachers.class_id = {$class['class_id']} AND session_id = $session_id";

        $result = mysqli_query($dbc, $query);

        if (mysqli_num_rows($result) > 0) {
            $record = mysqli_fetch_assoc($result);
            array_push($classTeachers, $record);
        } else {
            array_push($classTeachers, []);
        }
    }

    $_SESSION['data'] = [
        'classTeachers' => $classTeachers,
        'teachers' => $teachers,
        'classes' => $classes,
        'section_id' => $section_id,
        'session_id' => $session_id,
        'type' => $type
    ];
}





header("location:/result/admin/assignclassteacher");
