<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);
$staff_id = $_SESSION['user_id'];


//check if old password is valid
$query = "SELECT * FROM admin_staffs WHERE staff_id = $staff_id";
$result = mysqli_query($dbc, $query);

$record = mysqli_fetch_assoc($result);

$hash_password = $record['staff_login_password'];
if(password_verify($old_password, $hash_password) === false){
    $_SESSION['error'] = "Invalid password";
    header("Location: /result/admin/changepassword");

}

if($confirm_password !== $new_password){
    $_SESSION['error'] = "Passwords do not match";
    header("Location: /result/admin/changepassword");
}

$password_hash = password_hash($new_password, PASSWORD_BCRYPT);
$query = "UPDATE admin_staffs SET staff_login_password = '$password_hash' WHERE staff_id = $staff_id";
$result = mysqli_query($dbc, $query);



header("Location: /");



