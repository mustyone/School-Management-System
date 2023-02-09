<?php
include('../config/session.php');
include('../config/db.php');

$id =$_GET['id'];

$query = "DELETE FROM teacher_subjects WHERE teacher_subject_id = $id";
$reuslt = mysqli_query($dbc,$query);
if($reuslt){
    $_SESSION['message'] = "assignment removed successfully";
    header("location:../pages/admin/teachers.php");
}
else{
    $_SESSION['message'] = "Error removing assignment";
    header("location:../pages/admin/teachers.php");
}

