<?php
include('../config/session.php');
include('../config/db.php');

extract($_POST);

$query = "INSERT INTO teacher_subjects VALUES('',$subject_id, $teacher_id, $class_id)";
$reuslt = mysqli_query($dbc,$query);
if($reuslt){
    $_SESSION['message'] = "assignment was  successfully";
    header("location:../pages/admin/teachers.php");
}
else{
    $_SESSION['message'] = "Error in assignment";
    header("location:../pages/admin/teachers.php");
}

