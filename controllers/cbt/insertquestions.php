<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');
// dd($_POST);

$questionsCount = count($_POST['questions']);

$queries = "";
for($i = 0; $i < $questionsCount; $i++){
    
    $question = htmlspecialchars($_POST["question-{$i}"]);
    $optiontype = $_POST["optiontype-{$i}"]; //sc, mc, tf

    $options =json_encode($_POST["options-{$optiontype}-{$i}"]);
    $optionanswer = json_encode($_POST["optionanswer-{$optiontype}-{$i}"]);

    if($optiontype === 'sc'){
        $optiontype = 'sigle choice';

    }
    
    if($optiontype === 'mc'){
        $optiontype = 'multiple choice';

    }
    
    if($optiontype === 'tf'){
        $optiontype = 'true/false';

    }

    $subject_id = $_SESSION['active_subject_id'];
    $class_id = $_SESSION['examrecord']['class_id'];
    $exam_id = $_SESSION['examrecord']['id'];
    $created_at = date('Y-m-d');

    $queries .= "INSERT INTO cbt_question_bank (question_type,subject_id,question,question_metadata,answer,grading_type,class_id,exam_id,created_at) 
    VALUES ('$optiontype','$subject_id','$question','$options','$optionanswer','auto','$class_id','$exam_id','$created_at');";
}
$result = mysqli_multi_query($dbc,$queries);
$affected_rows  = mysqli_affected_rows($dbc);
if($affected_rows === $questionsCount){
    $_SESSION['message'] = "questions saved successfully";
    header("location:/cbt/questions");
}
else{
    $_SESSION['error'] = "pls currect the questions";
    header("location:/cbt/questions");
}

