<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$end_date = $_POST['end_date'];

$id = $_POST['section_id'];

$query = "DELETE FROM sections WHERE section_id=$id";
$result = mysqli_query($dbc, $query);


if(mysqli_affected_rows($dbc) > 0){
    $_SESSION['message'] = "School section has been removed successfully";
    header("location:/result/admin/allsections");
}
else{
    $_SESSION['error'] = "School section was not removed";
    header("location:/result/admin/deletesection/$id");
}
