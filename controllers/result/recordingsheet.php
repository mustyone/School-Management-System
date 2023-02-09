<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');

extract($_POST);

$class_id = $_POST['class_id'];
$session_id = $_POST['session_id'];
$term_id = $_POST['term_id'];
$students = fetchstudents($class_id);
$tests_category = fetchtests($class_id);

$query = "SELECT * FROM registered_students 
LEFT JOIN students ON registered_students.reg_student_id = students.student_id
WHERE class_id = $class_id AND reg_session_id = $session_id 
AND reg_term = $term_id
";

$result = mysqli_query($dbc, $query);


$record = [];

while ($row = mysqli_fetch_assoc($result)) {
    $record[] = $row;
}
$_SESSION['result'] = $record;

$_SESSION['data'] = [
    'class_id' => $class_id,
    'subject_id' => $subject_id,
    'session_id' => $session_id,
    'term_id' => $term_id,
    'students' => $students,
    'tests_category' => $tests_category,
    'section_id' => $section_id
];

header("location:/result/admin/recordingsheet");
