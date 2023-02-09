<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');

extract($_POST);


$query = "SELECT * FROM registered_students
LEFT JOIN students ON registered_students.reg_student_id = students.student_id
LEFT JOIN classes ON registered_students.class_id = classes.class_id
WHERE registered_students.class_id = $from_class_id AND reg_session_id = $from_session_id AND reg_term = 3";



try {
    $result = mysqli_query($dbc, $query);
    $studentsRecord = [];

    while ($row = mysqli_fetch_assoc($result)) {
        //check if the students is registered already
        array_push($studentsRecord, $row);
    }
} catch (\Exception $e) {
    /**@TODO log error to file */
    $_SESSION['error'] = "DB Error" . $e->getMessage();
    header("location:/result/admin/preparepromotionlist");
}


$_SESSION['data'] = [
    'from_session_id' => $from_session_id,
    'to_session_id' =>  $to_session_id,
    'from_class_id' => $from_class_id,
    'to_class_id' => $to_class_id,
    'studentsRecord' => $studentsRecord
];


header("location:/result/admin/preparepromotionlist");
