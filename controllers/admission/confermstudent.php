<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');

extract($_POST);

//dd($_POST);
$query = "SELECT * FROM admission_application_status LEFT JOIN admission_application_form 
ON admission_application_status.app_number = admission_application_form.app_number 
LEFT JOIN sessions ON admission_application_status.session_admitted_to = sessions.session_id 
WHERE admission_application_status.app_number = '$app_number'";
$result = mysqli_query($dbc, $query);
$num_rows = mysqli_num_rows($result);
if ($num_rows === 1) {
    $studentrecord = mysqli_fetch_assoc($result);
    $query = "SELECT MAX(student_id) AS max_id FROM students";
    $max_id = mysqli_fetch_assoc(mysqli_query($dbc, $query));

    $student_id = $max_id['max_id'] + 1;
    $newstudent_id = str_pad($student_id, 3, 0, STR_PAD_LEFT);

    $query = "INSERT INTO students VALUES ('$newstudent_id','$studentrecord[first_name]','$studentrecord[middle_name]','$studentrecord[last_name]','$studentrecord[class_admitted_to]','active','$studentrecord[sex]','$studentrecord[date_of_birth]','0','$studentrecord[passport_photograpy]')";
    $result = mysqli_query($dbc, $query);
    $_SESSION['message'] = "Student have been confirm";
    header("location:/admission/confirmation");
} else {
    $_SESSION['error'] = "Sorry student have not been admitted";
    header("location:/admission/confirmation");
}
