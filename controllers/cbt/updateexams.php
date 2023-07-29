<?php 
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

//dd($_POST);
$subject_ids = json_encode($subject_ids);

$number_of_questions = array_filter($_POST['number_of_questions'], fn ($val) => !empty($val) );
$number_of_questions = array_values($number_of_questions);
$number_of_questions = json_encode($number_of_questions);

$mark_per_questions = array_filter($_POST['mark_per_questions'], fn ($val) => !empty($val));
$mark_per_questions = array_values($mark_per_questions);
$mark_per_questions = json_encode($mark_per_questions);
$instruction = htmlspecialchars($instruction);

$query = "UPDATE cbt_exams SET 
exam_name = '$exam_name', status ='$status', question_ids = null, exam_subject_id = '$subject_ids', time_alloted_min = $time_alloted_min, number_of_question_subject = '$number_of_questions', allow_calculator = '$allow_calculator', instruction = '$instruction', mark_per_question ='$mark_per_questions',overallscore ='$overallscore',show_result_per_question ='$show_result_per_question',show_result_after_submit='$show_result_after_submit',requre_id='$requre_id',class_id='$class_id' WHERE id ='$id'";
$result = mysqli_query($dbc,$query);
$affected = mysqli_affected_rows($dbc);
if($affected ===1){
    $_SESSION['message'] = "Exam Have Been Updated";
    header("location:/cbt/examlist");
}
else{
    $_SESSSION['error'] = "Exam Have Not Been Updated";
    header("location:/cbt/examlist");
}