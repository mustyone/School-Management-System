<?php 
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$query = "SELECT * FROM admission_applications JOIN admission_application_form ON admission_applications.app_number = admission_application_form.app_number WHERE batch_id ='$batch_id'";

$result = mysqli_query($dbc,$query);
$num_rows = mysqli_num_rows($result);
$applicantsNumbers = [];
if($num_rows >=1){
    while($records= mysqli_fetch_assoc($result)){
        $applicantsBatch[$records['app_number']] = $records;
    }
}
 else{
    $_SESSION['error'] = "There Is No Student Apply For This Batch";
}

$query = "SELECT * FROM admission_application_status WHERE batch_id = $batch_id";
$result = mysqli_query($dbc,$query);
$admittedApplicants = [];
while($records= mysqli_fetch_assoc($result)){
    $admittedApplicants[$records['app_number']] = $records;
}

$newApplicants = array_diff_assoc($applicantsBatch, $admittedApplicants);

$query = "SELECT * FROM admission_batches WHERE batch_id = '$batch_id'";
$result = mysqli_query($dbc,$query);

$session = mysqli_fetch_assoc($result);

$_SESSION['records'] = $newApplicants;
$_SESSION['batch_id'] = $batch_id;
$_SESSION['session_id'] = $session['session_id'];
header("location:/admission/bulkadmission");
