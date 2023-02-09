<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');


$conditions = "";

$postItemCounter = count($_POST);
$internalCounter = 1;
echo "<pre>";

foreach ($_POST as $key => $val) {
    if (!empty($val)) {
        $conditions .= "$key = '$val'";
        echo "{$internalCounter} => {$postItemCounter} <br />";
        if ($internalCounter < $postItemCounter) {
            $conditions .= " AND ";
        }
    }

    $internalCounter++;
}

if(str_ends_with($conditions,"AND ")){
    $condLength = strlen($conditions);
    $conditions = substr($conditions, 0 , $condLength - 4);
}

$query = "SELECT * FROM students LEFT JOIN classes on students.student_class_id = classes.class_id
WHERE {$conditions}";

try {
    $result = mysqli_query($dbc, $query);
    $studentsRecord = [];

    while ($row = mysqli_fetch_assoc($result)) {
        //check if the students is registered already
        array_push($studentsRecord, $row);
    }
} catch (\Exception $e) {
    /**@TODO log error to file */

    $_SESSION['error'] = "DB Error";
    header("location:/result/admin/registerstudent");
}

$_SESSION['students'] = $studentsRecord;
header("location:/result/admin/students");
