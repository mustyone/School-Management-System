<?php 
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$query ="SELECT * FROM admission_pins WHERE batch_id = '$batch_id'";
$result = mysqli_query($dbc,$query);
$num_rows = mysqli_num_rows($result);
if($num_rows >=1){
    while($pinlogs = mysqli_fetch_assoc($result)){
        $_SESSION['pinlogs'][] = $pinlogs;
    }
    header("location:/admission/pinlogs");
}
else{
    $_SESSION['error'] = "No Pins Generated";
    header("location:/admission/pinlogs");
}
