<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');
extract($_POST);

$subjects = getSectionSubjects($section_id);
$teachers = getTeachers();
$classes = getSectionClasses($section_id);

if ($type === "assign") {
    


    $_SESSION['data'] = [
        'subjects' => $subjects,
        'teachers' => $teachers,
        'classes' => $classes,
        'section_id' => $section_id,
        'term_id' => $term_id,
        'session_id' => $session_id,
        'type' => $type
    ];
}

if ($type === "show") {

    //fetch the classes that belong to the section
    $sectionClasses = getSectionClasses($section_id);

    //get all the subjects that belong to that section
    $sectionSubjects = getSectionSubjects($section_id) ;

    foreach($sectionClasses as $class){
        $classKey = $class['class_alternative_name']. "_" . $class['class_id'];
        $subjectTeachers[$classKey] = [];

        foreach($sectionSubjects as $subject){
            $query = "SELECT *, teachers.teacher_id AS subject_teacher_id FROM teacher_subjects 
            LEFT JOIN subjects ON teacher_subjects.subject_id = subjects.subject_id
            LEFT JOIN teachers ON teacher_subjects.teacher_id = teachers.teacher_id
            WHERE teacher_subjects.subject_id = {$subject['subject_id']}
            AND class_id = {$class['class_id']} AND session_id = $session_id
            AND term_id = $term_id
            ";
            
            $result = mysqli_query($dbc, $query);

            if(mysqli_num_rows($result) > 0){
                $record = mysqli_fetch_assoc($result);

                array_push( $subjectTeachers[$classKey], $record);
            }
            else{
                array_push( $subjectTeachers[$classKey], []);

            }
        }
    }

    $_SESSION['data'] = [
        'subjectTeachers' => $subjectTeachers,
        'subjects' => $subjects,
        'teachers' => $teachers,
        'classes' => $classes,
        'section_id' => $section_id,
        'term_id' => $term_id,
        'session_id' => $session_id,
        'type' => $type
    ];



}



header("location:/result/admin/assignsubjects");
