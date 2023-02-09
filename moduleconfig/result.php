<?php
switch ($route){
    case "/result/admin/dashboard":
        $CURRENT_PAGE = "dashboard";
        $PAGE_TITLE = "Dashboard";

        //get the number of students
        $query = "SELECT COUNT(student_id) AS activeStudents FROM students WHERE 
        student_status = 'active'";
        $result = mysqli_query($dbc, $query);

        $row = mysqli_fetch_assoc($result);

        $activeStudents = $row['activeStudents'];

        //get the number of teachers
        $query = "SELECT COUNT(teacher_id) AS activeTeachers FROM teachers WHERE 
        teacher_login_status = 'active'";
        $result = mysqli_query($dbc, $query);

        $row = mysqli_fetch_assoc($result);


        $activeTeachers = $row['activeTeachers'];

        //get the number of classes
        $query = "SELECT COUNT(class_id) AS activeClasses FROM classes";
        $result = mysqli_query($dbc, $query);

        $row = mysqli_fetch_assoc($result);


        $activeClasses = $row['activeClasses'];

        //get the number of subjects
        $query = "SELECT COUNT(subject_id) AS activeSubjects FROM subjects";
        $result = mysqli_query($dbc, $query);

        $row = mysqli_fetch_assoc($result);

        $activeSubjects = $row['activeSubjects'];

        break;
    case "/result/admin/schoolinfo":
        $current_page = "schoolinfo";
        $page_title = "School Information";
        $page_description = "Update information about the school";

        //get the school information
        $query = "SELECT * FROM settings WHERE setting_name LIKE '%school_%'";

        $result = mysqli_query($dbc, $query);

        while ($row = mysqli_fetch_assoc($result)) {
            $schoolInfo[$row['setting_name']] =  $row['setting_value'];
        }
        break;
    case "/result/admin/newsession":
        $current_page = "newsession";
        $page_title = "Academic Session";
        $page_description = "Start a new academic session by filling the form below";
        break;
    case "/result/admin/academicsessions":
        $current_page = "newsession";
        $page_title = "Academic Sessions";
        $page_description = "Academic session records";

        $query = "SELECT * FROM sessions";
        $result = mysqli_query($dbc, $query);
        $academicSessions = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($academicSessions, $row);
        }
        break;
    case "/result/admin/editsession/":
        $current_page = "editpage";
        $page_title = "Edit Academic Session";
        $page_description = "Update this academic session record";
        $query = "SELECT * FROM sessions WHERE session_id = $id";
        $result = mysqli_query($dbc, $query);

        $sessionRecord = mysqli_fetch_assoc($result);
        break;
    case "/result/admin/deletesession/":
        $current_page = "editpage";
        $page_title = "Remove Academic Session";
        $page_description = "Remove record";
        break;

    case "/result/admin/markactivesession/":
        /** @var TYPE_NAME $id */
        $query = "SELECT * FROM sessions WHERE session_id = $id";
        $result = mysqli_query($dbc, $query);

        $sessionRecord = mysqli_fetch_assoc($result);

        $current_page = "editpage";
        $page_title = "Active Academic Session";
        $page_description = "Make this session the active session";
        break;

    case "/result/admin/newsection":

        $current_page = "editpage";
        $page_title = "New School Sections";
        $page_description = "Add a new school section";
        break;
    case "/result/admin/allsections":
        $current_page = "editpage";
        $page_title = "School Sections";
        $page_description = "All school sections";

        $query = "SELECT * FROM sections ";
        $result = mysqli_query($dbc, $query);

        $schoolSections = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($schoolSections, $row);
        }
        break;

    case "/result/admin/editsection/":
        $page_title = "Edit Section";
        $page_description = "Edit school section record";


        $query = "SELECT * FROM sections WHERE section_id = $id";
        $result = mysqli_query($dbc, $query);
        $sectionRecord = mysqli_fetch_assoc($result);

        break;
    case "/result/admin/deletesection/":
        $page_title = "Remove Section";
        $page_description = "Remove school section record";

        break;

    case "/result/admin/newclass":
        //get all the sections
        $query = "SELECT * FROM sections";
        $result = mysqli_query($dbc, $query);
        $sections = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($sections, $row);
        }

        $page_title = "New Class";
        $page_description = "Add a new class";
        break;
    case "/result/admin/allclasses":
        $query = "SELECT * FROM classes LEFT JOIN sections ON classes.section_id = sections.section_id ORDER BY section_shot_code DESC";
        $result = mysqli_query($dbc, $query);



        $classes = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($classes, $row);
        }

        $page_title = "Classes";
        $page_description = "Classes in the school";

        break;
    case "/result/admin/editclass/":
        $query = "SELECT * FROM sections";
        $result = mysqli_query($dbc, $query);
        $sections = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($sections, $row);
        }

        $query = "SELECT * FROM classes LEFT JOIN sections ON classes.section_id = sections.section_id WHERE class_id = $id";
        $result = mysqli_query($dbc, $query);
        $classRecord = mysqli_fetch_assoc($result);

        $page_title = "Edit class";
        $page_description = "Edit the class record";
        break;
    case "/result/admin/deleteclass/":
        $page_title = "Remove class";
        $page_description = "Remove the class record";
        break;

    case "/result/admin/newsubject":

        $query = "SELECT * FROM sections";
        $result = mysqli_query($dbc, $query);
        $sections = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($sections, $row);
        }

        $current_page = "newsubject";
        $page_title = "New Subject";
        $page_description = "Add a new subject to the record";

        break;

    case "/result/admin/allsubjects":

        $query = "SELECT * FROM subjects LEFT JOIN sections ON subjects.subject_section_id = sections.section_id";
        $result = mysqli_query($dbc, $query);
        $subjects = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($subjects, $row);
        }

        $current_page = "allsubjects";
        $page_title = "Subjects";
        $page_description = "All subjects record";

        break;

    case "/result/admin/editsubject/":
        $query = "SELECT * FROM sections";
        $result = mysqli_query($dbc, $query);
        $sections = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($sections, $row);
        }

        $query = "SELECT * FROM subjects WHERE subject_id = $id";
        $result = mysqli_query($dbc, $query);
        $subjectRecord = mysqli_fetch_assoc($result);

        $current_page = "allsubjects";
        $page_title = "Subjects";
        $page_description = "All subjects record";

        break;
    case "/result/admin/deletesubject/":
        $current_page = "allsubjects";
        $page_title = "Subjects";
        $page_description = "Remove subjects record";

        break;

    case "/result/admin/grading":
        $query = "SELECT * FROM sections";
        $result = mysqli_query($dbc, $query);
        $sections = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($sections, $row);
        }

        $current_page = "grading";
        $page_title = "Grading";
        $page_description = "Manage school grading";

        break;

    case "/result/admin/grading/":
        $query = "SELECT * FROM sections";
        $result = mysqli_query($dbc, $query);
        $sections = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($sections, $row);
        }


        $query = "SELECT * FROM sections WHERE section_id=$section_id";
        $result = mysqli_query($dbc, $query);
        $sectionRecord = mysqli_fetch_assoc($result);


        $current_page = "grading";
        $page_title = "Grading";
        $page_description = "Manage school grading for {$sectionRecord['section_shot_code']}";

        break;

    case "/result/admin/newassesment":

        $query = "SELECT * FROM sections";
        $result = mysqli_query($dbc, $query);
        $sections = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($sections, $row);
        }

        $query = "SELECT * FROM sessions";
        $result = mysqli_query($dbc, $query);
        $academicSessions = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($academicSessions, $row);
        }

        $current_page = "newassesment";
        $page_title = "Assesment";
        $page_description = "create a new assesment";
        break;
    case "/result/admin/allassesments":
        $query = "SELECT * FROM `tests` LEFT JOIN sections ON tests.test_section_id = sections.section_id
        LEFT JOIN sessions ON tests.test_session_id = sessions.session_id
        ORDER BY test_order ASC
        ";
        $result = mysqli_query($dbc, $query);
        $assesments = [];

        while ($row = mysqli_fetch_assoc($result)) {
            array_push($assesments, $row);
        }

        $current_page = "allassesments";
        $page_title = "Assesment";
        $page_description = "record of assesments";

        break;
    case "/result/admin/editassesment/":

        $query = "SELECT * FROM sections";
        $result = mysqli_query($dbc, $query);
        $sections = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($sections, $row);
        }

        $query = "SELECT * FROM sessions";
        $result = mysqli_query($dbc, $query);
        $academicSessions = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($academicSessions, $row);
        }

        $query = "SELECT * FROM tests WHERE test_id = $id";
        $result = mysqli_query($dbc, $query);
        $assesmentRecord = mysqli_fetch_assoc($result);

        $current_page = "newassesment";
        $page_title = "Assesment";
        $page_description = "edit an assesment";
        break;
    case "/result/admin/deleteassesment/":
        $current_page = "newassesment";
        $page_title = "Assesment";
        $page_description = "remove an assesment record";
        break;

    case "/result/admin/comments":
        $query = "SELECT * FROM sections";
        $result = mysqli_query($dbc, $query);
        $sections = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($sections, $row);
        }


        $current_page = "comments";
        $page_title = "Comments";
        $page_description = "manage the result comments for teachers and principal";
        break;

    case "/result/admin/comments/":
        $query = "SELECT * FROM sections WHERE section_id = $section_id";
        $result = mysqli_query($dbc, $query);
        $sectionRecord = mysqli_fetch_assoc($result);

        $query = "SELECT * FROM sections";
        $result = mysqli_query($dbc, $query);
        $sections = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($sections, $row);
        }

        $current_page = "comments";
        $page_title = "Comments";
        $page_description = "manage the result comments for teachers and principal";
        break;

    case "/result/admin/newstudent":
        $query = "SELECT * FROM classes";
        $result = mysqli_query($dbc, $query);
        $classes = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($classes, $row);
        }

        $current_page = "students";
        $page_title = "Student";
        $page_description = "Add a new student record";
        break;

    case "/result/admin/newbulkstudent":
        $query = "SELECT * FROM classes";
        $result = mysqli_query($dbc, $query);
        $classes = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($classes, $row);
        }

        $current_page = "students";
        $page_title = "Student";
        $page_description = "Import bulk students records";
        break;
    case "/result/admin/registerstudent":
        $query = "SELECT * FROM classes";
        $result = mysqli_query($dbc, $query);
        $classes = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($classes, $row);
        }

        $query = "SELECT * FROM sessions";
        $result = mysqli_query($dbc, $query);
        $academicSessions = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($academicSessions, $row);
        }

        $current_page = "students";
        $page_title = "Student";
        $page_description = "register students for a new session and term";

        break;
    case "/result/admin/students":
        $query = "SELECT * FROM classes";
        $result = mysqli_query($dbc, $query);
        $classes = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($classes, $row);
        }

        $query = "SELECT * FROM students
        LEFT JOIN classes on students.student_class_id = classes.class_id";
        $result = mysqli_query($dbc, $query);
        $students = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($students, $row);
        }


        $current_page = "students";
        $page_title = "Student";
        $page_description = "all students record";

        break;

    case "/result/admin/editstudent/":
        $query = "SELECT * FROM classes";
        $result = mysqli_query($dbc, $query);
        $classes = [];
        while ($row = mysqli_fetch_assoc($result)) {
            array_push($classes, $row);
        }

        $query = "SELECT * FROM students WHERE student_id = $id";
        $result = mysqli_query($dbc, $query);
        $studentRecord = mysqli_fetch_assoc($result);

        $current_page = "students";
        $page_title = "Student";
        $page_description = "edit student record";

        break;
    case "/result/admin/studentfile":

        $current_page = "students";
        $page_title = "Student";
        $page_description = "student records";

        break;
    case "/result/admin/uploadreport":
        $sessions = getActiveSession();
        $classes = getClasses();
        $sectionSubjects = getSectionSubjects();


        $current_page = "studentreport";
        $page_title = "Report";
        $page_description = "new report";

        break;
    case "/result/admin/updatereport":
        $sessions = getActiveSession();
        $classes = getClasses();
        $sectionSubjects = getSectionSubjects();

        $current_page = "studentreport";
        $page_title = "Report";
        $page_description = "update report";

        break;
    case "/result/admin/recordingsheet":
        $classes = getStudentClasses();
        $sessions = getActiveSession();

        $current_page = "studentreport";
        $page_title = "Report";
        $page_description = "print subject recording sheet";

        break;

    case "/result/admin/studentreport":
        $classes = getStudentClasses();
        $students = getStudents();
        $sessions = getActiveSession();

        $current_page = "studentreport";
        $page_title = "Report";
        $page_description = "print student report sheet";

        break;

    case "/result/admin/subjectbroadsheet":
        $classes = getStudentClasses();
        $students = getStudents();
        $sessions = getActiveSession();

        $current_page = "broadsheet";
        $page_title = "Broadsheet";
        $page_description = "subject broadsheet";
        break;

    case "/result/admin/newteacher":
        $current_page = "teacher";
        $page_title = "Teacher";
        $page_description = "New Teacher";
        break;

    case "/result/admin/teachers":
        $teachers = getTeachers();

        $current_page = "teacher";
        $page_title = "Teacher";
        $page_description = "Teachers Record";
        break;

    case "/result/admin/editteacher/":
        $query = "SELECT * FROM teachers WHERE teacher_id = $id";
        $result = mysqli_query($dbc, $query);

        $teacher = mysqli_fetch_assoc($result);
        $teacher_name = explode(" ", $teacher['teacher_fullname']);
        if (count($teacher_name) === 2) {
            $first_name = $teacher_name[0];
            $last_name = $teacher_name[1];
        } else {
            $first_name = $teacher_name[0];
            $middle_name = $teacher_name[1];
            $last_name = $teacher_name[2];
        }
        $current_page = "teacher";
        $page_title = "Teacher";
        $page_description = "Edit Teacher Record";
        break;

    case "/result/admin/deleteteacher/":
        $current_page = "teacher";
        $page_title = "Teacher";
        $page_description = "Remove Teacher Record";
        break;
    case "/result/admin/assignsubjects":
        $sections = getSections();
        $sessions = getActiveSession();
        $current_page = "teacher";
        $page_title = "Teacher";
        $page_description = "Designate subjects to teachers";
        break;
    case "/result/admin/assignclassteacher":
        $sections = getSections();
        $sessions = getActiveSession();
        $current_page = "teacher";
        $page_title = "Teacher";
        $page_description = "Designate a class to a teacher";
        break;
    case "/result/admin/preparepromotionlist":
        $sessions = getActiveSession();
        $classes = getClasses();
        $current_page = "promotion";
        $page_title = "Promotion";
        $page_description = "Prepare promotion list";

        break;
    case "/result/admin/promotionlist":
        $sessions = getActiveSession();
        $classes = getClasses();
        $current_page = "promotion";
        $page_title = "Promotion";
        $page_description = "Promotion list";

        break;
    case "/result/admin/newbackup":

        $current_page = "database";
        $page_title = "Database";
        $page_description =  "Backup database";
        break;
    case "/result/admin/backuprecords":
        $backups = getBackups();
        $current_page = "database";
        $page_title = "Database";
        $page_description =  "Backup records";
        break;
    case "/result/admin/restorebackup":

        $current_page = "database";
        $page_title = "Database";
        $page_description =  "Restore Backup";
        break;
    case "/result/admin/upgradeapp":
        $current_page = "app";
        $page_title = "App";
        $page_description =  "Upgrade App";
        break;
    case "/result/admin/changepassword":
        $current_page = "dashboard";
        $page_title = "Password";
        $page_description =  "change password";
        break;

    case "/result/teacher/dashboard":

        //get all the subjects assigned to the teacher
        $teacher_id = $_SESSION['teacher_id'];
        $session_id = ACTIVE_SESSION_ID;
        $term_id = ACTIVE_TERM_INDEX;

        $assignedSubjects = getTeacherSubjects($teacher_id,$session_id,$term_id);

        $current_page = "dashboard";
        $page_title = "Dashboard";
        $page_description =  "teacher dashboard";
        break;
    case "/result/teacher/uploadreport":
        $sessions = getActiveSession();
        $classes = getClasses();
        $sectionSubjects = getSectionSubjects();

        $current_page = "uploadentry";
        $page_title = "Entry";
        $page_description =  "report entry";
        break;

}