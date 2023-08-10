<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

$student_id = $_POST['student_id'];

$query = "SELECT * FROM students WHERE student_id = '$student_id'";
$result = mysqli_query($dbc,$query);


if(mysqli_num_rows($result) !== 1)
{
    $_SESSION['error'] = "The Admission Number is not correct";
    header("Location: /cbt");
    exit;
}

$row = mysqli_fetch_assoc($result);

$_SESSION['studentRecord'] = $row;
$_SESSION['allowedModules'] = ['cbt'];
header("Location: /cbt/student/dashboard");