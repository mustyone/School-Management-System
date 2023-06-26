<?php 
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$query = "SELECT * FROM admission_application_form WHERE batch_name ='$batch_id'";
$result = mysqli_query($dbc,$query);

$numrows = mysqli_num_rows($result);
if($numrows == 1){
    $record = mysqli_fetch_assoc($result);
    $query = "SELECT * FROM admission_batches WHERE batch_name =''";
    $result = mysqli_query($dbc,$query);

    if($record['require_pin'] == 'yes'){
       header("location:/admission/fetchapplications");
    }
    else{
        $_SESSION['error'] = "Batch";
        header("location:/admission/viewapplications");
    }
}
else{
    $_SESSION['error'] = "Batch";
    header("location:/admission/viewapplications");
}