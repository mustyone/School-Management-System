<?php
include "../../config/db.php";

$class_id = $_GET['class_id'];

$query = "SELECT * FROM students WHERE student_class_id = $class_id";
$result = mysqli_query($dbc,$query);

$record = [];

if($result){
    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }
}

echo json_encode($record);