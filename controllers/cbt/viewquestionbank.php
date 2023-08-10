<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');

extract($_POST);

$_SESSION['active_subject_id'] = $subject_id;


$exam_subject_id = json_decode($_SESSION['examrecord']['exam_subject_id']);

$number_of_question_per_subject = json_decode($_SESSION['examrecord']['number_of_question_subject']);

$index = array_search($subject_id,$exam_subject_id);

$number_of_question_per_subject = $number_of_question_per_subject[$index];

$_SESSION['number_of_question_per_subject'] = $number_of_question_per_subject;

dd($_SESSION['SubjectRecord']);
dd($_SESSION['SubjectRecord']);

//subject but exam record id fine

//dd($_SESSION['SubjectRecord'],$_SESSION['examrecord']);

header("location:/cbt/viewquestionbank");
