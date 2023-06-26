<?php 
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$creat_batch_code = str_replace(" ", "-", "$batch_name");
$batch_code = $creat_batch_code.'-'.$session_id.'-'.$term_id; // 2023-2024-Batch-1-1

$query = "UPDATE admission_batches  SET 
batch_name = '$batch_name', batch_code = '$batch_code', session_id = $session_id, term_id = $term_id,
status ='closed', start_date ='$start_date', end_date ='$end_date', require_pin ='$require_pin' 
 WHERE batch_id = $batch_id";

 
$result = mysqli_query($dbc,$query);

$affected_rows = mysqli_affected_rows($dbc);
if($affected_rows ==1){
    $_SESSION['message'] = "Record Updated";
    header("location:/admission/updatebatch/$batch_id");
}
else{
    $_SESSION['error'] ="Sorry Record Already Been Updated";
    header("location:/admission/updatebatch/$batch_id");
}

