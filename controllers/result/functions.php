<?php
function connect():mixed{
    require("../config/db.php");
    return $dbc;
}

//this is for teachers subjects
function getSubjects(){
    $link = connect();
    $teacher_id = $_SESSION['teacher_id'];
    $query = "SELECT * FROM teacher_subjects
    LEFT JOIN subjects ON teacher_subjects.subject_id = subjects.subject_id
    LEFT JOIN classes ON teacher_subjects.class_id = classes.class_id
    WHERE teacher_id = $teacher_id";
    $result = mysqli_query($link, $query);
    $record = [];

    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }

    return $record;
}

function getTeacherSubjects(){
    $link = connect();
    $query = "SELECT * FROM teacher_subjects
    LEFT JOIN subjects ON teacher_subjects.subject_id = subjects.subject_id
    LEFT JOIN classes ON teacher_subjects.class_id = classes.class_id
    LEFT JOIN teachers ON teacher_subjects.teacher_id = teachers.teacher_id";

    $result = mysqli_query($link, $query);
    $record = [];

    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }

    return $record;
}
function getClasses($withSection = false){
    $link = connect();
    $query = $withSection ? "SELECT * FROM classes LEFT JOIN sections ON classes.section_id =  sections.section_id" :  "SELECT * FROM classes";
    $result = mysqli_query($link, $query);
    $record = [];

    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }

    return $record;
}

function getActiveSession(){
    $link = connect();
    $query2 = "SELECT * FROM sessions";
    $result2 = mysqli_query($link,$query2);
    $record2 = [];
    while($row2 = mysqli_fetch_assoc($result2)){
        $record2[] = $row2;
    }
    return $record2;
}
function getTests(){
    $link = connect();
    $query2 = "SELECT * FROM tests 
    LEFT JOIN sessions ON tests.test_session_id = sessions.session_id 
    LEFT JOIN sections ON tests.test_section_id = sections.section_id";

    $result2 = mysqli_query($link,$query2);
    $record2 = [];
    while($row2 = mysqli_fetch_assoc($result2)){
        $record2[] = $row2;
    }
    return $record2;
}
function fetchStudents($class_id){
    session_start();
    $active_session = ACTIVE_SESSION_ID;
    $active_term = ACTIVE_TERM_INDEX;
    $dbc = connect();
    $query = "SELECT * FROM students 
    LEFT JOIN registered_students ON students.student_id = registered_students.reg_student_id 
    WHERE student_class_id = $class_id  AND reg_session_id=$active_session AND reg_term = $active_term";
    

    $result = mysqli_query($dbc,$query);
    $record = [];
    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }
    return $record;
}

function fetchStudentsForRegistration($class_id){
    session_start();
    $active_session = $_SESSION['active_session'];
    $active_term = $_SESSION['active_term'];
    $dbc = connect();
    $query = "SELECT * FROM students 
    WHERE student_class_id = $class_id";
    $result = mysqli_query($dbc,$query);
    $record = [];
    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }
    return $record;   
}
function fetchtests($class_id){
    $active_session = ACTIVE_SESSION_ID;
    $active_term = ACTIVE_TERM_INDEX;
    $dbc = connect();
    $query = "SELECT  * FROM classes LEFT JOIN tests
    ON classes.section_id = tests.test_section_id WHERE class_id = $class_id
    AND test_session_id = $active_session AND test_term = $active_term
    ORDER BY test_order ASC";

    $result = mysqli_query($dbc,$query);
    $record = [];
    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }
    return $record;
}

function getClassTeacherID($teacher_id){
    
}


function getTeacherClasses($teacher_id){
    $link = connect();
    $query = "SELECT * FROM teacher_subjects 
    LEFT JOIN classes ON teacher_subjects.class_id = classes.class_id
     WHERE teacher_id=$teacher_id";
    
    $result = mysqli_query($link,$query);
    $record = [];
    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }

    return $record;
    //return removeDuplicates($record,'class_alternative_name');
}

function removeDuplicates($arr, $column){

    $unique_array = [];

    $i = 0;
    foreach($arr as $record){
        if($i == 0) {
            $unique_array[] = $record;
        }else{
            $class_name =  $record[$column];
            foreach($unique_array as $array){
                if(in_array($class_name,$array) === true) break;
                $unique_array[] = $record;
            }
            
        }

        $i++;
    }

     array_pop($unique_array);

     return $unique_array;
}


function getSectionID($class_id){
    $link = connect();
    $query = "SELECT * FROM classes WHERE class_id = $class_id";
    
    $result = mysqli_query($link,$query);
    $record = mysqli_fetch_assoc($result);

    return $record['section_id'];
   
}

function fetchresults($class_id,$subject_id,$session_id,$term_id , $db = null){
    $link = $db ?? connect();
    $query = "SELECT * FROM results LEFT JOIN students ON results.result_student_id = students.student_id
    WHERE result_class_id = $class_id AND result_subject_id = $subject_id AND  result_session_id = $session_id AND 
    result_term = $term_id";

    $result = mysqli_query($db, $query);

    $record = [];
    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }

    return $record;
    
}

function fetchresult($student_id,$class_id,$subject_id,$session_id,$term_id , $db = null){

    $query = "SELECT * FROM results LEFT JOIN students ON results.result_student_id = students.student_id
    WHERE result_student_id = '$student_id' AND result_class_id = $class_id AND result_subject_id = $subject_id AND  result_session_id = $session_id AND 
    result_term = $term_id";

    $result = mysqli_query($db, $query);

    $record = [];
    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }

    return $record;
    
}

function searchTestScores($studentTestScore, $searchTestID){
    foreach($studentTestScore as $key => $val){
        foreach($val as $test_id => $test_score){
            if($searchTestID == $test_id){
                return $test_score;
            }
        }

    }
}


function getTeachers(){
    $link = connect();
    $query = "SELECT * FROM teachers LEFT JOIN classes ON teachers.teacher_class_id = classes.class_id";

    $result = mysqli_query($link, $query);

    $record = [];
    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }

    return $record;
}
function getSections(){
    $link = connect();
    $query = "SELECT * FROM sections";

    $result = mysqli_query($link, $query);

    $record = [];
    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }

    return $record;
}
function getSectionSubjects(){
    $link = connect();

    $sections = getSections();

    $record = [];

    foreach($sections as $section){
        $record[$section['section_name']] = [];
        $section_id = $section['section_id'];
        $query = "SELECT * FROM subjects WHERE subject_section_id=$section_id";

        $result = mysqli_query($link, $query);
        while($row = mysqli_fetch_assoc($result)){
            $record[$section['section_name']][] = $row;
        }
    }
    

    return $record;  
}

 function getSubject(){
    $link = connect();
    $query = "SELECT * FROM subjects LEFT JOIN sections ON subjects.subject_section_id = sections.section_id";

    $result = mysqli_query($link, $query);

    $record = [];
    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }

    return $record;
 }
 function getStudentClasses(){
    $link = connect();
    $query = "SELECT * FROM classes";
    $result = mysqli_query($link, $query);

    $record = [];
    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }

    return $record;
 }
 function getStudents(){
    $link = connect();
    $query = "SELECT * FROM students LEFT JOIN classes ON students.student_class_id = classes.class_id";
    $result = mysqli_query($link, $query);

    $record = [];
    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }

    return $record;
 }


 function getTermName($term_id){
     $termName = "";
     if($term_id == 1){
        $termName = "First";
     }
     else if($term_id == 2){
        $termName = "Second";
     }
     else{
         $termName = "Third";
     }


     return $termName;

 }

 function settings($setting_name){
    $link = connect();
    $query = "SELECT * FROM settings WHERE setting_name='$setting_name'";
    $result = mysqli_query($link, $query);

    $record = mysqli_fetch_assoc($result);

    return $record['setting_value'];
 }

 function number_in_class($class_id){
    $link = connect();
    $query = "SELECT * FROM students WHERE student_class_id=$class_id";

    $result = mysqli_query($link, $query);

    return mysqli_num_rows($result);
 }

 function averages($session, $term, $class, $nic){
    $link = connect();

    $query = "SELECT * FROM registered_students WHERE class_id = $class AND reg_session_id = $session AND reg_term = $term";
    $result = mysqli_query($link, $query);

    $averages = [];

    while($student = mysqli_fetch_assoc($result)){
        $query2 = "SELECT *, SUM(result_total_score) AS total_score FROM results WHERE result_session_id = $session 
        AND result_term = $term AND result_class_id = $class AND result_student_id = '$student[reg_student_id]'";
    
        $result2 = mysqli_query($link, $query2);
        $row = mysqli_fetch_assoc($result2);
        $averages[$student['reg_student_id']] = round($row['total_score'] / $nic, 2);
    }



    return $averages;
 }

 function getPosition($student_id, $session_id, $term_id, $class_id, $NIC){

    $averages = averages($session_id, $term_id, $class_id, $NIC);
    arsort($averages, 1);

    $admission_numbers = array_keys($averages);

    $index = array_search($student_id,$admission_numbers);
    $position = $index+1;

    $position_count = strlen($position);
    $last_digit = substr($position, -1);

    if($last_digit == "1" && strlen($position) == 1){
        return $position."<sup>st </sup>";
    }
    else if($last_digit == "2" && $position != "12"){
        return $position."<sup>nd </sup>";

    }
    else if($last_digit == "3"){
        return $position."<sup>rd</sup>";

    }
    else{
        return $position."<sup>th</sup>";

    }
}

function getSubjectScore($student_id, $subject_id, $session_id, $term_id){
    $link = connect();
    $query = "SELECT * FROM results WHERE result_student_id = $student_id 
    AND result_subject_id = $subject_id AND result_session_id = $session_id
    AND result_term = $term_id";

    $result = mysqli_query($link, $query);

    $num_rows = mysqli_num_rows($result);   

    if($num_rows == 1){
        $record = mysqli_fetch_assoc($result);
        return $record['result_total_score'];
    }
    else{
        return 0;
    }
}
function getSettings(){
    $link = connect();
    $query = "SELECT * FROM settings WHERE setting_name != 'active_term'";

    $result = mysqli_query($link, $query);

    $record = [];
    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }

    return $record;
}

function getSetting(string $key){
    $link = connect();
    $query = "SELECT * FROM settings WHERE setting_name = '$key'";

    $result = mysqli_query($link, $query);

    $record =mysqli_fetch_assoc($result);
    return $record['setting_value'];
}

function getBranches($section_id = null){
    $link = connect();
    $query = "SELECT DISTINCT branch FROM classes";

    $result = mysqli_query($link, $query);

    $record = [];
    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }

    return $record;
}