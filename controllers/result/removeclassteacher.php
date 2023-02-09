<?php
include('../config/session.php');
include('../config/db.php');

$teacher_id =$_GET['tid'];

$query = "UPDATE teachers SET teacher_class_id = 0  WHERE teacher_id=$teacher_id";
$reuslt = mysqli_query($dbc,$query);
if($reuslt){
    $_SESSION['message'] = "Class teacher assignment removed successfully";
    header("location:../pages/admin/teachers.php");
}
else{
    $_SESSION['message'] = "Error removing assignment";
    header("location:../pages/admin/teachers.php");
}

