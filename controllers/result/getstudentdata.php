<?php
include "../../config/db.php";

$class_id = $_GET['class_id'];
$session_id = $_GET['session_id'];
$term_id = $_GET['term_id'];

$query = "SELECT * FROM registered_students 
LEFT JOIN students ON registered_students.reg_student_id = students.student_id
WHERE class_id = $class_id AND reg_term = $term_id AND reg_session_id = $session_id";
$result = mysqli_query($dbc,$query);

$record = [];

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }
}


echo json_encode($record);