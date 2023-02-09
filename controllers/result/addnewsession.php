<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

$session_name = $_POST['session_name'];
$start_date = $_POST['start_date'];
$end_date = $_POST['end_date'];

$query = "INSERT INTO sessions(session_name,start_date,end_date,session_status) VALUES('$session_name','$start_date','$end_date','inactive')";
$result = mysqli_query($dbc, $query);


if($result){
    $_SESSION['message'] = "Academic session has been created successfully";
    header("location:/result/admin/academicsessions");
}
else{
    $_SESSION['error'] = "Academic session was not saved succesfully";
    header("location:/result/admin/newsession");
}
