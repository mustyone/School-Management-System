<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$redirect_url = isset($_POST['redirect_to']) ? '/result/admin/updatereport' : '/result/teacher/updatereport';

if(isset($_POST['submit'])){
    $success = $fail = 0;
    $student_ids = $_POST['student_ids'];
    $result_ids = $_POST['result_ids'];
    $session_id = $_POST['session_id'];
    $term_id = $_POST['term_id'];
    $subject_id = $_POST['subject_id'];
    $class_id = $_POST['class_id'];


    foreach($student_ids as $student_id){
        $test_scores =  $_POST[$student_id];
        $test_scores = json_encode($test_scores);
        $total = $_POST['total'][$student_id];
        $grade = $_POST['grade'][$student_id];
        $remark = $_POST['remark'][$student_id];
        $group_id = $student_id."/". $session_id."/".$term_id. "/".$class_id."/".$subject_id;
   
        $query = "UPDATE results SET result_test='$test_scores', result_total_score=$total, result_grade='$grade',result_remark='$remark'
        WHERE result_group_id = '$group_id'";
      
        $result = mysqli_query($dbc, $query);

        if($result){
            $success++;
        }
        else{
            $fail++;
        }

    }

    $_SESSION['message'] = "Report updated - Success: {$success} / Failed: {$fail}";

    header("location:{$redirect_url}");

}