<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$redirect_url = isset($_POST['redirect_to']) ? '/result/admin/uploadreport' : '/result/teacher/uploadreport';

if(isset($_POST['submit'])){
    $success = $fail = 0;
    $student_ids = $_POST['student_ids'];
    $session_id = $_POST['session_id'];
    $term_id = $_POST['term_id'];
    $subject_id = $_POST['subject_id'];
    $class_id = $_POST['class_id'];

    $multiquery = "";

    $failed = $success = 0;


    foreach($student_ids as $student_id){
        $test_scores =  $_POST[$student_id];
        $test_scores = json_encode($test_scores);
        $total = $_POST['total'][$student_id];
        $grade = $_POST['grade'][$student_id];
        $remark = $_POST['remark'][$student_id];
        $group_id = $student_id."/". $session_id."/".$term_id. "/".$class_id."/".$subject_id;
   
        $query = "INSERT INTO results(result_group_id,result_student_id,result_session_id, result_term,result_subject_id,result_class_id,result_test,result_total_score,result_grade,result_remark)
        VALUES('$group_id', '$student_id',$session_id,$term_id,$subject_id,$class_id,'$test_scores',$total,'$grade','$remark' );
        ";


        $result = mysqli_query($dbc, $query);

        if($result !== false){
            $success++;
        }
        else{
            $fail++;
        }


    }

    $_SESSION['message'] = "Report uploaded - Success: {$success} / Failed: {$fail}";

    header("location:{$redirect_url}");


}