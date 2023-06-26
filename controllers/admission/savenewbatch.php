<?php 
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$creat_batch_code = str_replace(" ", "-", "$batch_name");
$batch_code = $creat_batch_code.'-'.$session_id.'-'.$term_id; // 2023-2024-Batch-1-1
$query = "INSERT INTO admission_batches (batch_name,batch_code,session_id,term_id,status,start_date,end_date,require_pin) 
VALUES('$batch_name','$batch_code','$session_id','$term_id','$status','$start_date','$end_date','$require_pin')";

try{
    $result = mysqli_query($dbc,$query);
    $_SESSION['message'] = "Record Saved Successful";
    header("location:/admission/newbatch");
  }
catch(\Exception $e){
    $_SESSION['error'] ="Sorry This Batch Exist";
    header("location:/admission/newbatch");
}
  

