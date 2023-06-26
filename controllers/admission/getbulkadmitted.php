<?php 
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);
$query = "SELECT * FROM admission_application_status LEFT JOIN admission_application_form ON admission_application_status.app_number = admission_application_form.app_number LEFT JOIN sessions ON admission_application_status.session_admitted_to = sessions.session_id 
WHERE batch_id ='$batch_id' AND status ='admitted'";
    $result = mysqli_query($dbc,$query);
    $num_rows = mysqli_num_rows($result);
    $admitted = [];
if($num_rows >=1){
    while($admitted = mysqli_fetch_assoc($result)){
        $_SESSION['bulkadmissionletters'][] = $admitted;
    };
    header("location:/admission/bulkadmissionletters");
    
}
else{
    $_SESSION['error'] = "There is no admitted student for this batch.";
    header("location:/admission/bulkadmissionletter");
}



