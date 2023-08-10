<?php
switch ($route){
    case "/cbt/student/dashboard":

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

        $cbtquery = "SELECT * FROM cbt_exams WHERE status ='active'";

        $cbtresult = mysqli_query($dbc,$cbtquery);
        $num_rows = mysqli_num_rows($cbtresult);
        if($num_rows ===1){
            $cbtexams = mysqli_fetch_assoc($cbtresult);
            $_SESSION['cbt_exams'] = $cbtexams;
        }

        break;
    case "/cbt/dashboard":
        $title = "CBT Module";
        break;
    case "/cbt/instructions":
        $current_page = "Exam";
        $page_title = "Exam Instruction";
        $page_description = "Exam Instructions";
        $instruction = htmlspecialchars_decode($_SESSION['cbt_exams']['instruction']);

        break;
    case "/cbt/exams":    
        $current_page = "Exam";
        $page_title = "Exams";
        $page_description = "Exams Page";

        $exam_subject_id = json_decode($_SESSION['cbt_exams']['exam_subject_id'], true);

        $subject_ids = implode(',',$exam_subject_id);
        
        $query = "SELECT * FROM subjects WHERE subject_id IN($subject_ids) ";
        $result = mysqli_query($dbc,$query);
        $num_rows = mysqli_num_rows($result);
        if($num_rows){
            $subjects = []; 
            while($record = mysqli_fetch_assoc($result)){
                $subjects[] = $record;
            }
        }
        break;
    
    case "/cbt/examlist":
        $current_page = "exam";
        $page_title = "Exam List";
        $page_description = "Exam List";

        $query = "SELECT * FROM cbt_exams LEFT JOIN classes ON cbt_exams.class_id = classes.class_id";
        $result = mysqli_query($dbc,$query);
        $records = [];
        while($rows = mysqli_fetch_assoc($result)){
            $records[] = $rows;
        }

        

        break;

    case '/cbt/updateexam/':
        $current_page = "exam";
        $page_title = "Update Exam";
        $page_description = "Update Exam";

        $query = "SELECT * FROM cbt_exams WHERE id = '$id'";
        $result = mysqli_query($dbc,$query);

        $update = mysqli_fetch_assoc($result);

        $sectionSubjects = getSectionSubjects();

        $query = "SELECT * FROM classes";
        $result = mysqli_query($dbc,$query);
        $records = [];
        while($rows = mysqli_fetch_assoc($result)){
            $records[] = $rows;
        }

        break;

    case '/cbt/createexam':
        $current_page = "exam";
        $page_title = "Create Exam";
        $page_description = "Create New Exam";

        $sectionSubjects = getSectionSubjects();

        $query = "SELECT * FROM classes";
        $result = mysqli_query($dbc,$query);
        $records = [];
        while($rows = mysqli_fetch_assoc($result)){
            $records[] = $rows;
        }
        break;

    case '/cbt/picexams':
    case "/cbt/picexamquestionbank":

        $current_page = "Question";
        $page_title = "Question";
        $page_description = "Add Question";

        $sectionSubjects = getSectionSubjects();

        $query = "SELECT * FROM cbt_exams";
        $result = mysqli_query($dbc,$query);
        $exams = [];
        while($rows = mysqli_fetch_assoc($result)){
            $exams[] = $rows;
        }
        break;

        case '/cbt/viewquestionbank':
            $current_page = "Question";
            $page_title = "Question";
            $page_description = "Add Question";


            $subject_id = $_SESSION['SubjectRecord']['subject_id'];
            $exam_id = $_SESSION['examrecord']['exam_id'];


            $query = "SELECT * FROM cbt_question_bank WHERE exam_id = $exam_id AND subject_id = $subject_id";
            dd($_SESSION['SubjectRecord'],$_SESSION['examrecord'],$query);
            $result = mysqli_query($dbc,$query);
            $questions = [];
            while($rows = mysqli_fetch_assoc($result)){
                $questions[] = $rows;
            }            
            break;

    
}