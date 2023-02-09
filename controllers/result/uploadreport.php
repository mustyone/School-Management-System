<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$class_id = $_POST['class_id'];
$subject_id = $_POST['subject_id'];
$session_id = $_POST['session_id'];
$term_id = $_POST['term_id'];

$students = fetchstudents($class_id);
$tests_category = fetchtests($class_id);
$section_id = getSectionID($class_id);


$_SESSION['data'] = [
    'class_id' => $class_id,
    'subject_id' => $subject_id,
    'session_id' => $session_id,
    'term_id' => $term_id,
    'students' => $students,
    'tests_category' => $tests_category,
    'section_id' => $section_id
];
header("location:/result/admin/uploadreport");

