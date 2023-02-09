<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH. '/config/db.php');

extract($_POST);

//get the session name
$query = "SELECT * FROM sessions WHERE session_id = $session_id";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_assoc($result);
$session_name = $row['session_name'];
$term_name = getTermName($term_id);



//fetch all the registered students for the session , term and class
$query = "SELECT * FROM registered_students 
LEFT JOIN students ON registered_students.reg_student_id = students.student_id
WHERE reg_session_id = $session_id
AND reg_term = $term_id AND class_id = $class_id";

$result = mysqli_query($dbc, $query);
$students = [];
while($row = mysqli_fetch_assoc($result)){
    $students[] = $row;
}
//fetch all the subjects that belongs to the class_id
$query = "SELECT * FROM classes 
LEFT JOIN sections ON classes.section_id = sections.section_id
LEFT JOIN subjects ON sections.section_id = subjects.subject_section_id
WHERE class_id = $class_id
";

$result = mysqli_query($dbc, $query);
$subjects = [];
while($row = mysqli_fetch_assoc($result)){
    $subjects[] = [
        $row['subject_id'] => $row['subject_name']
    ];
}


$_SESSION['broadsheet'] = [
    'subjects' => $subjects,
    'students' => $students,
    'session_id' => $session_id,
    'term_id' => $term_id,
    'session_name' => $session_name,
    'term_name' => $term_name
];

header("location:/result/admin/subjectbroadsheet");
