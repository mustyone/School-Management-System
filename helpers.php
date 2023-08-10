<?php
/**
 * @return string
 * @throws Exception
 * Generate a random char
 */
function random_char(): string
{
    $chars = ['A', 'B', 'C', 'D'];
    $index =  random_int(0, count($chars) - 1);

    return $chars[$index];
}

/**
 * @param array|string ...$data
 * @return void
 *
 * Dump data ana exit
 *
 */
function dd(array|string|null ...$data):string
{
    foreach ($data as $d) {
        $d = is_null($d) ? 'null' : $d;
        echo "<pre>";
        print_r($d);
        echo "</pre>";
    }


    exit();
}

/**
 * @param array|string ...$data
 * @return string
 * Dump data but do not exit
 */
function d(array|string ...$data)
{
    foreach ($data as $d) {
        echo "<pre>";
        print_r($d);
        echo "</pre>";
    }
}

function randomFunc(){}

/**
 * @param $path
 * @return string
 *
 */
function base_url($path = null)
{
    if (!is_null($path)) {
        return BASE_URL . "/" . $path;
    }

    return BASE_URL;
}

/**
 * @param $type
 * @param Exception $e
 * @return void
 * Log error messages to file
 */
function log_message($type = "message", Exception $e)
{
    //write messsage to file?

    // file_put_contents($filename, $content);
}

/**
 * @param $setting_name
 * @return string
 * Return the value of a particular setting
 */
function setting($setting_name):string
{
    global $dbc;
    $query = "SELECT * FROM settings WHERE setting_name='$setting_name'";
    $result = mysqli_query($dbc, $query);

    $record = mysqli_fetch_assoc($result);

    return $record['setting_value'];
}

/**
 * @param $section_id
 * @return array
 * Returns the grades for a particular school section
 */
function sectiongrading($section_id):array
{
    global $dbc;
    $query = "SELECT * FROM grades WHERE grade_section_id = $section_id ORDER BY grade_min_score DESC";
    $result = mysqli_query($dbc, $query);

    $record = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $record[] = $row;
    }

    return $record;
}

/**
 * @param $student_id
 * @param $class_id
 * @param $subject_id
 * @param $session_id
 * @param $term_id
 * @param $db
 * @return array
 *
 * Fetch a single result record for a particular student.
 */

function fetchresult($student_id, $class_id, $subject_id, $session_id, $term_id, $db = null):array
{

    $query = "SELECT * FROM results LEFT JOIN students ON results.result_student_id = students.student_id
    WHERE result_student_id = '$student_id' AND result_class_id = $class_id AND result_subject_id = $subject_id AND  result_session_id = $session_id AND 
    result_term = $term_id";

    $result = mysqli_query($db, $query);

    $record = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $record[] = $row;
    }

    return $record;
}

/**
 * @param $term_id
 * @return string
 * Get the term name for a term id
 */
function getTermName($term_id):string
{
    $termName = "";
    if ($term_id == 1) {
        $termName = "First";
    } else if ($term_id == 2) {
        $termName = "Second";
    } else {
        $termName = "Third";
    }


    return $termName;
}

/**
 * @param $session_id
 * @param $term_id
 * @param $class_id
 * @return int
 * Returns the number of students in a class
 */
function number_in_class($session_id, $term_id, $class_id):int
{
    global $dbc;

    $query = "SELECT * FROM registered_students 
    WHERE class_id = $class_id AND reg_session_id = $session_id AND reg_term = $term_id";
    // $query = "SELECT * FROM students WHERE student_class_id=$class_id";

    $result = mysqli_query($dbc, $query);

    return (int) mysqli_num_rows($result);
}

/**
 * @param $class_id
 * @return array
 * Returns the continous assesments for a class. Example First CA, Second CA
 */
function fetchtests($class_id):array
{
    global $dbc;

    $active_session = ACTIVE_SESSION_ID;
    $active_term = ACTIVE_TERM_INDEX;

    $query = "SELECT  * FROM classes LEFT JOIN tests
    ON classes.section_id = tests.test_section_id WHERE class_id = $class_id
    AND test_session_id = $active_session AND test_term = $active_term
    ORDER BY test_order ASC";


    $result = mysqli_query($dbc, $query);
    $record = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $record[] = $row;
    }
    return $record;
}

/**
 * @param $student_id
 * @param $session_id
 * @param $term_id
 * @param $class_id
 * @param $NIC
 * @return string
 * Returns the positonof a student in the position format. Example: 1st, 2nd, 3rd
 */
function getPosition($student_id, $session_id, $term_id, $class_id, $NIC):string
{

    $averages = averages($session_id, $term_id, $class_id, $NIC);
    arsort($averages, 1);

    $admission_numbers = array_keys($averages);

    $index = array_search($student_id, $admission_numbers);
    $position = $index + 1;

    $position_count = strlen($position);
    $last_digit = substr($position, -1);

    if ($last_digit == "1" && strlen($position) == 1) {
        return $position . "<sup>st </sup>";
    } else if ($last_digit == "2" && $position != "12") {
        return $position . "<sup>nd </sup>";
    } else if ($last_digit == "3") {
        return $position . "<sup>rd</sup>";
    } else {
        return $position . "<sup>th</sup>";
    }
}

/**
 * @param $session
 * @param $term
 * @param $class
 * @param $nic
 * @return array
 * Returns an array of the averages of all students in a particular session, term and class
 */
function averages($session, $term, $class, $nic):array
{

    global $dbc;

    $query = "SELECT * FROM registered_students WHERE class_id = $class AND reg_session_id = $session AND reg_term = $term";
    // d($query);
    $result = mysqli_query($dbc, $query);

    $averages = [];

    while ($student = mysqli_fetch_assoc($result)) {
        $query2 = "SELECT *, SUM(result_total_score) AS total_score, COUNT(*) AS resultCount FROM results 
        WHERE result_session_id = $session 
        AND result_term = $term AND result_class_id = $class 
        AND result_student_id = '$student[reg_student_id]'";

        $result2 = mysqli_query($dbc, $query2);
        $row = mysqli_fetch_assoc($result2);


        $averages[$student['reg_student_id']] = !is_null($row['total_score']) ?
            round($row['total_score'] / $row['resultCount'], 2) : 0;
    }



    return $averages;
}

/**
 * @param $class_id
 * @return array
 * Returns an array of all students that has been registered in a class
 */
function fetchStudents($class_id):array
{
    global $dbc;
    $active_session = ACTIVE_SESSION_ID;
    $active_term = ACTIVE_TERM_INDEX;

    // $query = "SELECT * FROM students 
    // LEFT JOIN registered_students ON students.student_id = registered_students.reg_student_id 
    // WHERE student_class_id = $class_id  AND reg_session_id=$active_session AND reg_term = $active_term";

    $query  = "SELECT * FROM registered_students
    LEFT JOIN students ON registered_students.reg_student_id = students.student_id
    WHERE students.student_class_id = $class_id  AND reg_session_id=$active_session AND reg_term = $active_term";
    $result = mysqli_query($dbc, $query);
    $record = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $record[] = $row;
    }

    return $record;
}

/**
 * @param $class_id
 * @return int
 * Returns the ID of a section
 */
function getSectionID($class_id):int
{
    global $dbc;
    $query = "SELECT * FROM classes WHERE class_id = $class_id";

    $result = mysqli_query($dbc, $query);
    $record = mysqli_fetch_assoc($result);

    return (int) $record['section_id'];
}

/**
 * @param bool $withSection
 * @return array
 * Returns an array of school classes
 */
function getClasses($withSection = false):array
{
    global $dbc;
    $query = $withSection ? "SELECT * FROM classes LEFT JOIN sections ON classes.section_id =  sections.section_id" :  "SELECT * FROM classes";
    $result = mysqli_query($dbc, $query);
    $record = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $record[] = $row;
    }

    return $record;
}

/**
 * Returns an array of classes that belong to a section
 * @param $section_id
 * @param $withSection
 * @return array
 * @dep
 */
function getSectionClasses($section_id, $withSection = false):array
{
    global $dbc;
    $query = $withSection ?
        "SELECT * FROM classes LEFT JOIN sections ON classes.section_id =  sections.section_id WHERE section_id = $section_id " :
        "SELECT * FROM classes WHERE section_id = $section_id";
    $result = mysqli_query($dbc, $query);
    $record = [];

    while ($row = mysqli_fetch_assoc($result)) {
        $record[] = $row;
    }

    return $record;
}

/**
 *  Returns an array of all subjects in a section
 * @param $section_id
 * @return array
 *
 */
function getSectionSubjects($section_id = null):array
{
    global $dbc;

    $sections = getSections();

    $record = [];

    if (is_null($section_id)) {
        foreach ($sections as $section) {
            $record[$section['section_name']] = [];
            $section_id = $section['section_id'];
            $query = "SELECT * FROM subjects WHERE subject_section_id=$section_id";

            $result = mysqli_query($dbc, $query);
            while ($row = mysqli_fetch_assoc($result)) {
                $record[$section['section_name']][] = $row;
            }
        }
    } else {

        $query = "SELECT * FROM subjects WHERE subject_section_id=$section_id";

        $result = mysqli_query($dbc, $query);
        while ($row = mysqli_fetch_assoc($result)) {
            $record[] = $row;
        }
    }

    return $record;
}

/**
 * Returns an array of all sections
 * @return array
 */
function getSections(): array
{
    global $dbc;


    $query = "SELECT * FROM sections";

    $result = mysqli_query($dbc, $query);

    $record = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $record[] = $row;
    }

    return $record;
}

/**
 * Returns an array of all sessions
 * @return array
 * @note The name can be changed to reflect the functionality
 */
function getActiveSession(): array
{
    global $dbc;
    $query2 = "SELECT * FROM sessions";
    $result2 = mysqli_query($dbc, $query2);
    $record2 = [];
    while ($row2 = mysqli_fetch_assoc($result2)) {
        $record2[] = $row2;
    }
    return $record2;
}

/**
 * Returns an array of all results for a class and subject for a session and term
 * @param $class_id
 * @param $subject_id
 * @param $session_id
 * @param $term_id
 * @return array
 */
function fetchresults($class_id, $subject_id, $session_id, $term_id): array
{
    global $dbc;

    // $query = "SELECT * FROM registered_students
    // LEFT JOIN results ON results.result_student_id = registered_students.reg_student_id
    // LEFT JOIN students ON registered_students.reg_student_id = students.student_id
    // WHERE result_class_id = $class_id AND result_subject_id = $subject_id AND  result_session_id = $session_id AND 
    // result_term = $term_id
    // ";
    $query = "SELECT * FROM results 
    LEFT JOIN students ON results.result_student_id = students.student_id
    WHERE result_class_id = $class_id AND result_subject_id = $subject_id AND  result_session_id = $session_id AND 
    result_term = $term_id";

    $result = mysqli_query($dbc, $query);

    $record = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $record[] = $row;
    }

    return $record;
}
/**
 * @return int
 * */

function searchTestScores($studentTestScore, $searchTestID)
{
    foreach ($studentTestScore as $key => $val) {
        foreach ($val as $test_id => $test_score) {
            if ($searchTestID == $test_id) {
                return $test_score;
            }
        }
    }
}

/**
 * @return void
 */
function getStudentClasses()
{
    global $dbc;
    $query = "SELECT * FROM classes";
    $result = mysqli_query($dbc, $query);

    $record = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $record[] = $row;
    }

    return $record;
}

function getStudents()
{
    global $dbc;
    $query = "SELECT * FROM students LEFT JOIN classes ON students.student_class_id = classes.class_id";
    $result = mysqli_query($dbc, $query);

    $record = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $record[] = $row;
    }

    return $record;
}


function getTeacherComment($averageScore)
{
    global $dbc;

    // $averageScore > min_score AND $averageScore <= max_score

    $query = "SELECT * FROM comments WHERE type='teacher' 
    AND $averageScore > min_score AND $averageScore < max_score";
    $result = mysqli_query($dbc, $query);

    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        $record = mysqli_fetch_assoc($result);
        return $record['comment'];
    }

    return "";
}

function getPrincipalComment($averageScore)
{
    global $dbc;

    $query = "SELECT * FROM comments 
    WHERE type='principal' AND $averageScore > min_score AND $averageScore < max_score";
    $result = mysqli_query($dbc, $query);

    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        $record = mysqli_fetch_assoc($result);
        return $record['comment'];
    }

    return "";
}

function getClassTeacherName($class_id, $session_id)
{
    global $dbc;

    $query = "SELECT * FROM class_teachers 
    LEFT JOIN teachers ON class_teachers.teacher_id = teachers.teacher_id
    WHERE class_id = $class_id AND session_id = $session_id";

    $result = mysqli_query($dbc, $query);

    $rows = mysqli_num_rows($result);

    if ($rows > 0) {
        $record = mysqli_fetch_assoc($result);
        return $record['teacher_fullname'];
    }

    return "";
}

function getAverageForSession($student_id, $session_id, $class_id)
{
    global $dbc;

    define('NUMBER_OF_TERMS', 3);

    $sessionAverage = 0;

    //get for each terms
    for ($term = 1; $term <= NUMBER_OF_TERMS; $term++) {
        //get all the results for that term and session
        $query = "SELECT SUM(result_total_score) AS total, COUNT(*) AS resultCount 
        FROM results WHERE result_session_id = $session_id AND result_student_id = '$student_id'
        AND result_term = $term";

        $result = mysqli_query($dbc, $query);

        if (mysqli_num_rows($result) > 0) {
            $record = mysqli_fetch_assoc($result);

            $sessionAverage +=
                !is_null($record['total']) ?
                $record['total'] / $record['resultCount'] : 0;
        }
    }

    return number_format($sessionAverage, 2);
}

function getSubjectScore($student_id, $subject_id, $session_id, $term_id)
{
    global $dbc;
    $query = "SELECT * FROM results WHERE result_student_id = '$student_id '
    AND result_subject_id = $subject_id AND result_session_id = $session_id
    AND result_term = $term_id";

    $result = mysqli_query($dbc, $query);

    $num_rows = mysqli_num_rows($result);

    if ($num_rows == 1) {
        $record = mysqli_fetch_assoc($result);
        return $record['result_total_score'];
    } else {
        return 0;
    }
}

function getTeachers()
{
    global $dbc;
    // $query = "SELECT * FROM teachers LEFT JOIN classes ON teachers.teacher_class_id = classes.class_id";
    $query = "SELECT * FROM teachers";
    $result = mysqli_query($dbc, $query);

    $record = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $record[] = $row;
    }

    return $record;
}

function getBackups(){
    global $dbc;

    $query = "SELECT * FROM backups";

    $result = mysqli_query($dbc, $query);

    $record = [];
    while ($row = mysqli_fetch_assoc($result)) {
        $record[] = $row;
    }

    return $record;


}

function getTeachersSubjects(){
    global $dbc;
    $query = "SELECT * FROM teacher_subjects
    LEFT JOIN subjects ON teacher_subjects.subject_id = subjects.subject_id
    LEFT JOIN classes ON teacher_subjects.class_id = classes.class_id
    LEFT JOIN teachers ON teacher_subjects.teacher_id = teachers.teacher_id";

    $result = mysqli_query($dbc, $query);
    $record = [];

    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }

    return $record;
}

function getTeacherSubjects($teacher_id, $session_id, $term_id){
    global $dbc;
    $query = "SELECT * FROM teacher_subjects 
    LEFT JOIN subjects ON teacher_subjects.subject_id = subjects.subject_id 
    LEFT JOIN classes ON teacher_subjects.class_id = classes.class_id 
    WHERE teacher_subjects.teacher_id = $teacher_id AND session_id = $session_id AND term_id = $term_id";

    $result = mysqli_query($dbc, $query);
    $record = [];

    while($row = mysqli_fetch_assoc($result)){
        $record[] = $row;
    }

    return $record;
}

function uploadedResult($subject_id, $session_id, $term_id){
    global $dbc;
    $query = "SELECT * FROM results WHERE result_subject_id = $subject_id AND result_session_id = $session_id AND result_term = $term_id";

    $result = mysqli_query($dbc, $query);

    if(mysqli_num_rows($result) >= 1){
        return true;
    }

    return false;
}

function old($key){
    if(isset($_SESSION['old'][$key])){
        return $_SESSION['old'][$key];
    }

    return null;
}

function getSetting(string $key){
    global $dbc;
    $query = "SELECT * FROM settings WHERE setting_name = '$key'";

    $result = mysqli_query($dbc, $query);

    $record =mysqli_fetch_assoc($result);
    return $record['setting_value'];
}