<?php 
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_GET);

$query = "UPDATE admission_batches SET status = 'closed'";
$result = mysqli_query($dbc,$query);

$affected_rows = mysqli_affected_rows($dbc);
if($affected_rows >= 1){
    $query = "UPDATE admission_batches SET status= 'open' WHERE batch_id = '$batch_id'";
    $result = mysqli_query($dbc,$query);
    $affected = mysqli_affected_rows($dbc);
    if($affected === 1){
        $_SESSION['message'] = "Batch Open";
        header("location:/admission/viewbatches");
    }
    else{
        $_SESSION['error'] = "Batch Have Not Been Open";
        header("location:/admission/viewbatches");
    }
    
}
else{
    $_SESSION['error'] = "Batch Can Not Be Closed";
    header("location:/admission/viewbatches");
}
	

