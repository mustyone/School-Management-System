<?php
include('../config/session.php');
include('../config/db.php');

$session_id = $_POST['session_id'];
$query = "UPDATE sessions SET session_status='inactive'";
$result = mysqli_query($dbc, $query);


$query = "UPDATE sessions SET session_status='active' WHERE session_id='$session_id'";

$result = mysqli_query($dbc, $query);


if($result){
    $_SESSION['message'] = "Session has been set to active";
    header("location:/pages/admin/session.php");
}
else{
    $_SESSION['message'] = "Error!! no session was made active";
    header("location:/pages/admin/session.php");
}
