<?php 
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$query = "SELECT * FROM admission_batches WHERE batch_id ='$batch_id'";
$result = mysqli_query($dbc,$query);

$num_rows = mysqli_num_rows($result);
if($num_rows === 1){
    $batchRecord = mysqli_fetch_assoc($result);

    $query = "SELECT MAX(app_id) AS max_id FROM admission_applications";

    $maxIDRow = mysqli_fetch_assoc(mysqli_query($dbc, $query));

    $max_id = $maxIDRow['max_id'] + 1;

    //$date = date("Ymd"); this date is not chenging (showing error duplicate entry)
    $time = time();
    $application_number = "{$batchRecord['batch_code']}/{$time}/{$max_id}";
   
    $_SESSION['batch_id'] = $batchRecord['batch_id'];
    $_SESSION['app_number'] = $application_number;


    $_SESSION['batch_record'] = $batchRecord;
    $_SESSION['applicationRecord'] = [
        'applicationNumber' => $application_number,
        'applicationData' => []
    ];




    header("location:/admission/newapplication");
}
else{
    $_SESSION['error'] ="Sorry pls check Another Batch";
    header("location:/admission/newapplication");
}

