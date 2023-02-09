<?php
require_once "config/db.php";
require "helpers.php";

$host = $_SERVER['SERVER_NAME'];
$port = $_SERVER['SERVER_PORT'];
define('APP_PATH', $_SERVER['DOCUMENT_ROOT']);
define('APP_VERSION',"2.0");
define('BASE_URL', "http://{$host}:{$port}");
define('APP_NAME','SRPS');


//get the active term
$query = "SELECT * FROM settings WHERE setting_name = 'active_term'";
$row = mysqli_fetch_assoc(mysqli_query($dbc,$query));
$active_term_index  = $row['setting_value'];

if($active_term_index == 1){
    $active_term = "First";
}
else if($active_term_index == 2){
    $active_term = "Second";
}
else{
    $active_term = "Third";
}


define('ACTIVE_TERM',$active_term); //First
define('ACTIVE_TERM_INDEX', $active_term_index); //1,2,3

//get active session
$query = "SELECT * FROM sessions WHERE session_status='active'";
$row = mysqli_fetch_assoc(mysqli_query($dbc,$query));
$active_session_id  = $row['session_id'];
$active_session_name = $row['session_name'];

define('ACTIVE_SESSION_NAME', $active_session_name);
define('ACTIVE_SESSION_ID', $active_session_id);
