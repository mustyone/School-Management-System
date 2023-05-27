<?php 
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$query = "INSERT INTO admission_batches (batch_name,batch_code,session_id,term_id,status,start_date,end_date,require_pin) 
VALUES('$batch_name','$batch_code','$session_id','$term_id','$status','$start_date','$end_date','$require_pin')";
$result = mysqli_query($dbc,$query);

$affected_rows = mysqli_affected_rows($dbc);
if($affected_rows ==1){
    $_SESSION['message'] = "Record Saved Successful";
    header("location:/admission/newbatch");
}
else{
    $_SESSION['error'] ="Sorry pls check the input";
    header("location:/admission/newbatch");
}

