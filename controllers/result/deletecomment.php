<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');



$id = $_POST['comment_id'];

$query = "DELETE FROM comments WHERE id=$id";
$result = mysqli_query($dbc, $query);


if(mysqli_affected_rows($dbc) > 0){
    $_SESSION['message'] = "Comment has been removed successfully";
    header("location:/result/admin/comments");
}
else{
    $_SESSION['error'] = "Comment was not removed";
    header("location:/result/admin/deletecomment/$id");
}
