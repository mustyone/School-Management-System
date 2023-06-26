<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$batch_id = $_SESSION['batch_id'];
$session_id = $_SESSION['session_id'];

$query = "";

foreach($app_numbers as $key => $app_number){
  $query .= "INSERT INTO admission_application_status 
  VALUES('$app_number','$status','$session_id','$class_id[$key]','$batch_id');";
}
$result = mysqli_multi_query($dbc,$query);

if($result){
    $_SESSION['message'] = "Student Have Been Admitted";
    header("location:/admission/bulkadmission");
}
else{
    $_SESSION['error'] = "Student Has Already Been Admitted";
    header("location:/admission/bulkadmission");
}




