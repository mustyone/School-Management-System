<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$last4 = substr($phone_number,7,10);

$password = password_hash($last4,PASSWORD_BCRYPT);
$teacher_name = "{$first_name} {$middle_name} {$last_name}";
$teacher_class_id = !empty($class_id)  ? $class_id : 0;

$query = "UPDATE teachers SET teacher_fullname = '$teacher_name',teacher_username = '$user_name',
teacher_title= '$title', teacher_login_username = '$phone_number', teacher_login_password = '$password' 
WHERE teacher_id = $teacher_id";

try{
    $result = mysqli_query($dbc,$query);
    if($result){
        $_SESSION['message'] = "Teacher record updated succesfully";
        header("location:/result/admin/editteacher/{$teacher_id}");
    }
    else{
        $_SESSION['error'] = "Error Adding Teacher";
        header("location:/result/admin/editteacher/{$teacher_id}");
    }
    
}
catch(Exception $e){
    $_SESSION['error'] = "DB Error";
    header("location:/result/admin/editteacher/{$teacher_id}");
}

