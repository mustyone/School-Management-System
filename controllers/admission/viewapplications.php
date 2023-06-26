<?php 
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$query = "SELECT * FROM admission_applications 
LEFT JOIN admission_application_form ON admission_applications.app_number = admission_application_form.app_number
LEFT JOIN classes ON admission_application_form.class_id = classes.class_id
WHERE batch_id ='$batch_id'";
$result = mysqli_query($dbc,$query);

$num_rows = mysqli_num_rows($result);
if($num_rows >=1){
    while($rows = mysqli_fetch_assoc($result)){
        $_SESSION['records'][] = $rows;
    }
    header("location:/admission/viewapplications");

}
else{
    $_SESSION['error'] = "No Record Found";
    header("location:/admission/viewapplications");
}




