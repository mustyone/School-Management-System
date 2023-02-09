<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$section_id = $_POST['section_id'];
$type = $_POST['type'];

$query = "SELECT * FROM comments WHERE type ='$type' AND section_id = $section_id";

try{
    $result = mysqli_query($dbc, $query);
    $comments = [];

    while($row = mysqli_fetch_assoc($result)){
        array_push($comments, $row);
    }

}
catch(\Exception $e){
    /**@TODO log error to file */
    
    $_SESSION['error'] = "DB Error";
    header("location:/result/admin/comments");

}
$_SESSION['type'] = $type;
$_SESSION['comments'] = $comments;
header("location:/result/admin/comments/$section_id");

