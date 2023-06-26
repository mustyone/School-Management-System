<?php 
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);
$query = "SELECT * FROM admission_application_status 
LEFT JOIN admission_application_form ON admission_application_status.app_number = admission_application_form.app_number 
LEFT JOIN sessions ON admission_application_status.session_admitted_to = sessions.session_id 
WHERE admission_application_status.app_number='B1234/20230603/3'";
$result = mysqli_query($dbc,$query);
$num_rows = mysqli_num_rows($result);
$student = [];
if($num_rows ===1){
    $student = mysqli_fetch_assoc($result);
    $_SESSION['student'] = $student;
    header("location:/admission/admissionletter");
}
else{
    $_SESSION['error'] = "You Have Not Been Admitted";
    header("location:/admission/sigleadmissionletter");
}



