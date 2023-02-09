<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);
$teacher_id = $_SESSION['teacher_id'];

//check if old password is valid
$query = "SELECT * FROM teachers WHERE teacher_id = $teacher_id";
$result = mysqli_query($dbc, $query);

$record = mysqli_fetch_assoc($result);

$hash_password = $record['teacher_login_password'];

if(password_verify($old_password, $hash_password) === false){
    $_SESSION['error'] = "Invalid password";
    header("Location: /result/teacher/changepassword");

}

if($confirm_password !== $new_password){
    $_SESSION['error'] = "Passwords do not match";
    header("Location: /result/teacher/changepassword");
}

$password_hash = password_hash($new_password, PASSWORD_BCRYPT);
$query2 = "UPDATE teachers SET teacher_login_password = '$password_hash' WHERE teacher_id = $teacher_id";
$result = mysqli_query($dbc, $query2);



header("Location: /logout");



