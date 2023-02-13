<?php
switch ($route){
    case "/cbt/student/dashboard":

        $sample = rand(10,100);
        $page_title = "Choose `Test";
        $session_id = ACTIVE_SESSION_ID;
        $term_id = ACTIVE_TERM_INDEX;
        $studentRecord = $_SESSION['studentRecord'];
        $class_id = $studentRecord['student_class_id'];

        $query = "SELECT * FROM exams LEFT JOIN exam_subjects ON exams.exam_id = exam_subjects.exam_id 
                     LEFT JOIN subjects ON subjects.subject_id = exam_subjects.subject_id WHERE session_id = $session_id 
                      AND term_id = $term_id 
                      AND class_id = $class_id";

        $result = mysqli_query($dbc,$query);
        $exams = [];

        while($row = mysqli_fetch_assoc($result))
        {
            array_push($exams,$row);
        }

        break;
    case "/cbt/dashboard":
        $title = "CBT Module";
        break;

}