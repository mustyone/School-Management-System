<?php 
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$query = "SELECT * FROM admission_application_form LEFT JOIN classes ON admission_application_form.class_id = classes.class_id WHERE app_number = '$app_number'";
$result = mysqli_query($dbc,$query);

$numrows = mysqli_num_rows($result);
if($numrows === 1){
    $row = mysqli_fetch_assoc($result);
    $_SESSION['record'] = $row;
    header("location:/admission/singleadmission");
}
else{
    $_SESSION['error'] = "Invacorect Application Numnber";
    header("location:/admission/singleadmission");
}
