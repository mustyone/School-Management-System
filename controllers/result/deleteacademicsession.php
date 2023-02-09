<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$end_date = $_POST['end_date'];

$id = $_POST['session_id'];

$query = "DELETE FROM sessions WHERE session_id=$id";
$result = mysqli_query($dbc, $query);


if(mysqli_affected_rows($dbc) > 0){
    $_SESSION['message'] = "Academic session has been removed successfully";
    header("location:/result/admin/academicsessions");
}
else{
    $_SESSION['error'] = "Academic session was not removed";
    header("location:/result/admin/deletesession/$id");
}
