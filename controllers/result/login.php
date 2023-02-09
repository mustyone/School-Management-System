<?php
include('../../config/session.php');
include('../../config/db.php');
//include("functions.php");
// $name = $_GET['teacher'];
$type = $_POST['userType'];

if($type === "teacher"){
    $username = $_POST['username'];
    $password = $_POST['password'];
    $query = "SELECT * FROM teachers WHERE teacher_login_username ='$username' AND teacher_login_status = 'active'";
    $result = mysqli_query($dbc,$query);
    $num_rows = mysqli_num_rows($result);
    if($num_rows ==1){
        $record = mysqli_fetch_assoc($result);
        $hash = $record['teacher_login_password'];
        $password_verify = password_verify($password,$hash);
        if($password_verify){
            $_SESSION['teacher_id'] = $record['teacher_id'];
            $_SESSION['loggedIn'] = true;
            $_SESSION['fullname'] = $record['teacher_fullname'];
            $_SESSION['role'] = "teacher";

            $queryA = "SELECT * FROM sessions WHERE session_status='active'";
            $queryB = "SELECT * FROM settings WHERE setting_name='active_term'";

            $resultA = mysqli_query($dbc, $queryA);
            $resultB = mysqli_query($dbc, $queryB);
            $_SESSION['active_session'] = mysqli_fetch_assoc($resultA)['session_id'];
            $_SESSION['active_term'] = mysqli_fetch_assoc($resultB)['setting_value'];

            if($record['teacher_class_id'] != 0){
                $_SESSION['class_teacher_id'] = $record['teacher_class_id'];
            }

            header("location:/result/teacher/dashboard");
        }
        else{
            $_SESSION['error'] = "Invalid login credentials";
            header("location:/result");
        } 
    }
    else{
            $_SESSION['error'] = "Invalid login credentials";
            header("location:/result");
        } 
}


if($type === "exam_officer"){
    $username2 = $_POST['username'];
    $password2 = $_POST['password'];
    $query2 = "SELECT * FROM admin_staffs WHERE staff_name ='$username2'";
    $result2 = mysqli_query($dbc,$query2);
    $num_rows2 = mysqli_num_rows($result2);
    if($num_rows2 ==1){
        $record2 = mysqli_fetch_assoc($result2);
        $hash2 = $record2['staff_login_password'];
        $password_verify2 = password_verify($password2,$hash2);
        if($password_verify2){
            $_SESSION['loggedIn'] = true;
            $_SESSION['role'] = "admin";
            $_SESSION['staff_role'] = $record2['staff_role']; 
            $_SESSION['staff'] =  $_SESSION['fullname'] = $record2['staff_name'];
            $_SESSION['staff_id'] = $record2['staff_id'];


            header("location:/result/admin/dashboard");
        }
        else{
            $_SESSION['error'] = "Invalid login credentials";
            header("location:/result");
        } 
    }
    else{
        $_SESSION['error'] = "Invalid login credentials";
        header("location:/result");
    }
}