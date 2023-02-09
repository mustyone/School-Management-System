<?php
include('../../config/session.php');
include('../../config/db.php');
include('../../config/role.php');
//include("functions.php");
// $name = $_GET['teacher'];

$username = $_POST['username'];
$password = $_POST['password'];


//search for the username in db
$query = "SELECT * FROM users WHERE staff_username = '$username'";
$result = mysqli_query($dbc,$query);
$num_rows = mysqli_num_rows($result);

//check if the username exists
if($num_rows !== 1)
{
    //redirect back to the login page and show an invalid credentials error message
    $_SESSION['error'] = "Invalid login credentials";

    header("Location: /");
    exit;
}

$userRecord = mysqli_fetch_assoc($result);

//check if the staff credentials is active
if($userRecord['staff_login_status'] !== 'active')
{
    $_SESSION['error'] = "Invalid login credentials";
    header("Location: /");
    exit;
}

//verify the password
$passwordHash = $userRecord['staff_login_password'];
if(!password_verify($password,$passwordHash))
{
    $_SESSION['error'] = "Invalid login credentials";
    header("Location: /");
    exit;
}


//the credentials have been validated
$userRole = $userRecord['staff_role'];

if($userRole === "teacher")
{
    $_SESSION['userIsTeacher'] = true;

    //fetch the teacher record
    $query = "SELECT * FROM teachers WHERE teacher_login_username = '$username'";
    $result = mysqli_query($dbc,$query);
    $teacherRecord = mysqli_fetch_assoc($result);

    $_SESSION['teacher_id'] = $teacherRecord['teacher_id'];

    if($teacherRecord['teacher_class_id'] != 0){
        $_SESSION['class_teacher_id'] = $teacherRecord['teacher_class_id'];
    }

}

if(!array_key_exists($userRole,$roles)){
    $_SESSION['error'] = "Unrecognized user";
    header("Location: /");
    exit;
}

//remove the password
unset($userRecord['staff_login_password']);

$_SESSION['userIsTeacher'] = false;
$_SESSION['user_id'] = $userRecord['staff_id'];
$_SESSION['loggedIn'] = true;
$_SESSION['user'] = $userRecord;
$_SESSION['allowedModules'] = $roles[$userRole]['modules'];

header("Location: /modules");