<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$session_name = $_POST['session_name'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];
$id = $_POST['session_id'];

$query = "UPDATE sessions SET session_name='$session_name', start_date='$start_date', end_date='$end_date' WHERE session_id=$id";
$result = mysqli_query($dbc, $query);


if(mysqli_affected_rows($dbc) > 0){
    $_SESSION['message'] = "Academic session has been updated successfully";
    header("location:/result/admin/academicsessions");
}
else{
    $_SESSION['error'] = "Academic session was not updated";
    header("location:/result/admin/academicsessions");
}
