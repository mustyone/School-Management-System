<?php
include('../config/session.php');
include('../config/db.php');


if(isset($_POST['submit'])){
    $success = $fail = 0;
    $student_ids = $_POST['student_ids'];
    $current_class_id = $_POST['current_class_id'];
    $next_class_id = $_POST['next_class_id'];


    foreach($student_ids as $student_id){   
        $query = "UPDATE students SET student_class_id = $next_class_id WHERE student_id = '$student_id'";
    
        $result = mysqli_query($dbc, $query);

        if($result){
            $success++;
        }
        else{
            $fail++;
        }

    }
    
    $_SESSION['result'] = ['success' => $success, 'fail' => $fail];
    header("location:/pages/admin/promotion.php");


}