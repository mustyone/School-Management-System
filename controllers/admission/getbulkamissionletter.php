<?php 
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$query = "SELECT * FROM admission_application_status 
LEFT JOIN sessions ON admission_application_status.session_admitted_to = sessions.session_id 
WHERE app_number = '$app_number'";
$result = mysqli_query($dbc,$query);

$num_rows = mysqli_num_rows($result);
$row = [];
if($num_rows ===1){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['admitted'] = $row;
    $query = "SELECT * FROM admission_application_form WHERE app_number ='$app_number'";
    $result = mysqli_query($dbc,$query);
    $num_rows = mysqli_num_rows($result);
    $student = [];
        if($num_rows ===1){
            $student = mysqli_fetch_assoc($result);
            $_SESSION['student'] = $student;
            header("location:/admission/admissionletter");
        }
        else{
            $_SESSION['error'] = "No Application Application Found";
            header("location:/admission/bulkadmissionletter");
        }
    
}
else{
    $_SESSION['error'] = "You Have Not Been Admitted";
    header("location:/admission/bulkadmissionletter");
}



