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

    $date = date("Ymd");
    $application_number = "{$batchRecord['batch_code']}/{$date}/{$max_id}";

    //Insert the record into applications table
    $query = "INSERT INTO admission_applications SET batch_id={$batchRecord['batch_id']}, app_number='$application_number'";
    mysqli_query($dbc, $query);


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

