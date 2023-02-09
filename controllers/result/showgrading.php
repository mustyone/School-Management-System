<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$section_id = $_POST['section_id'];

$query = "SELECT * FROM grades WHERE grade_section_id = $section_id";
try{
    $result = mysqli_query($dbc, $query);
    $grades = [];

    while($row = mysqli_fetch_assoc($result)){
        array_push($grades, $row);
    }
}
catch(\Exception $e){
    /**@TODO log error to file */
    
    $_SESSION['error'] = "DB Error";
    header("location:/result/admin/grading");
}
$_SESSION['sectionGrading'] = $grades;
header("location:/result/admin/grading/$section_id");

