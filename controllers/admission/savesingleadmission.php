<?php 
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$query = "SELECT * FROM admission_applications LEFT JOIN admission_batches ON admission_applications.batch_id  = admission_batches.batch_id WHERE app_number = '$app_number'";
$result = mysqli_query($dbc,$query);

$num_rows = mysqli_num_rows($result);
if($num_rows !== 1){
    $_SESSION['error'] = "App number is invalid";
    header("location:/admission/singleadmission");
}


$row = mysqli_fetch_assoc($result);
$query = "INSERT INTO admission_application_status (app_number,status,session_admitted_to,class_admitted_to) VALUES ('$app_number','$admitted','$row[session_id]','$class_id')";

try{
  $result = mysqli_query($dbc,$query);
  $_SESSION['message'] = "Student Have Been Admitted";
  header("location:/admission/singleadmission");
  
}
catch(\Exception $e){
   $_SESSION['error'] = "Student Has Alredy Been Admitted";
    header("location:/admission/singleadmission");
}
