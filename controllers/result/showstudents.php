<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$session_id = $_POST['session_id'];
$term_id = $_POST['term_id'];
$class_id = $_POST['class_id'];

$query = "SELECT * FROM students WHERE student_class_id = $class_id";

try{
    $result = mysqli_query($dbc, $query);
    $studentsRecord = [];

    while($row = mysqli_fetch_assoc($result)){
        //check if the students is registered already
        $query2 = "SELECT * FROM registered_students 
        WHERE reg_student_id = '$row[student_id]' AND class_id = $class_id 
        AND reg_session_id = $session_id AND reg_term = $term_id";

        $result2 = mysqli_query($dbc,$query2);
        $num_rows = mysqli_num_rows($result2);

        $row['registered'] = false;
        if($num_rows > 0){
            $registrationRecord = mysqli_fetch_assoc($result2);

            $row['registered'] = true;
            $row['reg_id'] = $registrationRecord['reg_id'];
        }
        


        array_push($studentsRecord, $row);
    }

}
catch(\Exception $e){
    /**@TODO log error to file */
    
    $_SESSION['error'] = "DB Error" . $e->getMessage();
    header("location:/result/admin/registerstudent");
}
$_SESSION['session_id'] = $session_id;
$_SESSION['term_id'] = $term_id;
$_SESSION['class_id'] = $class_id;
$_SESSION['studentsRecord'] = $studentsRecord;
header("location:/result/admin/registerstudent");

