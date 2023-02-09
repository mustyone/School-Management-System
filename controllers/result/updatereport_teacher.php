<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$session_id = ACTIVE_SESSION_ID;
$term_id = ACTIVE_TERM_INDEX;

/** @var TYPE_NAME $class_id */
$students = fetchStudents($class_id);
$tests_category = fetchtests($class_id);
$section_id = getSectionID($class_id);

/** @var TYPE_NAME $subject_id */
$results = fetchresults($class_id,$subject_id,$session_id,$term_id);

$query = "SELECT * FROM sessions WHERE session_id = $session_id";
/** @var TYPE_NAME $dbc */
$result = mysqli_query($dbc, $query);
$sessionRecord = mysqli_fetch_assoc($result);

$query = "SELECT * FROM classes WHERE class_id = $class_id";
$result = mysqli_query($dbc, $query);
$classRecord = mysqli_fetch_assoc($result);


$query = "SELECT * FROM subjects WHERE subject_id = $subject_id";
$result = mysqli_query($dbc, $query);
$subjectRecord = mysqli_fetch_assoc($result);

$_SESSION['data'] = [
    'class_id' => $class_id,
    'subject_id' => $subject_id,
    'session_id' => $session_id,
    'term_id' => $term_id,
    'students' => $students,
    'tests_category' => $tests_category,
    'section_id' => $section_id,
    'results' => $results,
    'session_name' => $sessionRecord['session_name'],
    'class_name' => $classRecord['class_alternative_name'],
    'subject_name' => $subjectRecord['subject_name'],
    'term_name' => getTermName($term_id)
];
header("location:/result/teacher/updatereport");

