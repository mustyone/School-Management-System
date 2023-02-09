<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$end_date = $_POST['end_date'];

$id = $_POST['session_id'];
$active_term_index = $_POST['active_term'] ?? 1;

//check if the session is due to start
$query = "SELECT * FROM sessions WHERE session_id = $id";
$result = mysqli_query($dbc, $query);
$sessionRecord = mysqli_num_rows($result) > 0 ? mysqli_fetch_assoc($result) : [];

$currentDate = date("Ymd");

$startDate = str_replace("-","",$sessionRecord['start_date']);
$endDate = str_replace("-","",$sessionRecord['end_date']);

if($startDate > $currentDate){
    $_SESSION['warning'] = "The session is not due to start except on $sessionRecord[start_date]";
    header("location:/result/admin/markactivesession/$id");
}

if($endDate > $currentDate){
    $_SESSION['warning'] = "Session ended on $sessionRecord[start_date]";
    header("location:/result/admin/markactivesession/$id");
}


$query = "UPDATE sessions SET session_status='inactive'";
$result = mysqli_query($dbc, $query);

$query = "UPDATE sessions SET session_status='active' WHERE session_id= $id";
$result = mysqli_query($dbc, $query);


$query = "UPDATE settings SET setting_value = $active_term_index WHERE setting_name = 'active_term'";
$result = mysqli_query($dbc, $query);

if(mysqli_affected_rows($dbc) > 0){
    $_SESSION['message'] = "Academic session has been set to active";
    header("location:/result/admin/academicsessions");
}
else{
    $_SESSION['error'] = "Academic session was not set";
    header("location:/result/admin/markactivesession/$id");
}
