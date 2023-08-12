<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');

extract($_POST);

$query = "SELECT * FROM cbt_exams WHERE id ='$exam_id'";
$result = mysqli_query($dbc, $query);
$num_rows = mysqli_num_rows($result);
if ($num_rows === 1) {
    $record = mysqli_fetch_assoc($result);
    $_SESSION['examrecord'] = $record;
    $subject_id = json_decode($record['exam_subject_id'], true);
    $subject_id = implode(',', $subject_id);

    $query = "SELECT * FROM subjects WHERE subject_id IN($subject_id)";
    $result = mysqli_query($dbc, $query);
    $num_rows = mysqli_num_rows($result);
    if ($num_rows >= 1) {

        while ($rows = mysqli_fetch_assoc($result)) {
            $_SESSION['SubjectRecord'][] = $rows;
        }
        header("location:/cbt/picsubjects");
    } 
    else {
        $_SESSION['error'] = 'Pls try and pick the right exam';
        header("location:/cbt/picexams");
    }
} else {
    $_SESSION['error'] = 'Pls try and pick the right exam';
    header("location:/cbt/picexams");
}
