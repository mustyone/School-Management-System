<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$last4 = substr($phone_number,7,10);

$password = password_hash($last4,PASSWORD_BCRYPT);
$teacher_name = "{$first_name} {$middle_name} {$last_name}";
$teacher_class_id = !empty($class_id)  ? $class_id : 0;

$query = "INSERT INTO teachers(teacher_fullname,teacher_username,teacher_title,
teacher_login_username,teacher_login_password,teacher_login_status,teacher_class_id)
VALUES('$teacher_name','$user_name','$title','$phone_number','$password','active',$teacher_class_id)";
try{
    $result = mysqli_query($dbc,$query);
    if($result){
        $_SESSION['message'] = "Teacher Added succesfully";
        header("location:/result/admin/teachers");
    }
    else{
        $_SESSION['error'] = "Error Adding Teacher";
        header("location:/result/admin/newteacher");
    }
    
}
catch(Exception $e){
    $_SESSION['error'] = "DB Error";
    header("location:/result/admin/newteacher");
}

