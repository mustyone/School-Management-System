<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');
// include(APP_PATH . '/controllers/functions.php');

$student_id = $_POST['student_id'];

//check all the registered sessions for the student
$regStudentsQuery = "SELECT * FROM registered_students 
LEFT JOIN sessions ON registered_students.reg_session_id = sessions.session_id
LEFT JOIN classes ON registered_students.class_id = classes.class_id
LEFT JOIN students ON registered_students.reg_student_id = students.student_id


WHERE reg_student_id = $student_id";

$regStudentsResult = mysqli_query($dbc, $regStudentsQuery);

$studentResults = [];
while ($regStudentsRow = mysqli_fetch_assoc($regStudentsResult)) {

    $sessionName = $regStudentsRow['session_name'];
    $termName = $regStudentsRow['reg_term']."_term";
    $studentResults[$sessionName][$termName] = [];
    $studentResults[$sessionName]['studentInfo'] = [
        'student_id' => $regStudentsRow['student_id'],
        'name' => "{$regStudentsRow['student_first_name']}{$regStudentsRow['student_middle_name']}{$regStudentsRow['student_last_name']}",
        'gender' =>  $regStudentsRow['gender'],
        'photo' =>  $regStudentsRow['student_first_name'],
        'class' => $regStudentsRow['class_alternative_name'],
        'class_id' => $regStudentsRow['class_id'],
    ];


    //get all subjects that belong to the section
    $subjectQuery = "SELECT * FROM subjects WHERE subject_section_id = '" . $regStudentsRow['section_id'] . "' ";
    $subjectQueryResult = mysqli_query($dbc, $subjectQuery);

    //loop through each subjects and fetch the result for that subject
    while ($subjectRow = mysqli_fetch_assoc($subjectQueryResult)) {
        $subjectResult = fetchresult(
            $student_id,
            $regStudentsRow['class_id'],
            $subjectRow['subject_id'],
            $regStudentsRow['reg_session_id'],
            $regStudentsRow['reg_term'],
            $dbc
        );

        array_push( $studentResults[$sessionName][$termName] , $subjectResult[0]);
    }

}

$_SESSION['studentFile'] = [
    'results' => $studentResults,
    'payments' => []
];

header("location:/result/admin/studentfile");
