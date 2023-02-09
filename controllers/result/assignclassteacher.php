<?php
include('../config/session.php');
include('../config/db.php');

extract($_POST);

$query = "UPDATE teachers SET teacher_class_id = $class_id  WHERE teacher_id=$teacher_id";
$reuslt = mysqli_query($dbc,$query);
if($reuslt){
    $_SESSION['message'] = "Class teacher assignment successfully";
    header("location:../pages/admin/teachers.php");
}
else{
    $_SESSION['message'] = "Error in assignment";
    header("location:../pages/admin/teachers.php");
}

