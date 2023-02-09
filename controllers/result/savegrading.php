<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');

extract($_POST);

$multiquery = "";

$numberOfGrades = count($Agrades);

for ($i=0; $i < $numberOfGrades; $i++) { 
    $multiquery .= "INSERT INTO grades(grade_char,grade_min_score,grade_max_score,grade_remark,grade_section_id)
    VALUES('$Agrades[$i]',$Amin_scores[$i],$Amax_scores[$i],'$Aremarks[$i]',$section_id);
    ";
}

try{
    $result = mysqli_multi_query($dbc,$multiquery);

    if($result){
        $_SESSION['message'] = "Record saved successfully";
        header("location:/result/admin/grading");
    }
    else{
        $_SESSION['error'] = "One or more grades could not be saved";
        header("location:/result/admin/grading");
    }

}
catch(\Exception $e){
    /**@TODO log error to file */
    $_SESSION['error'] = "DB Error" . $e->getMessage();
    header("location:/result/admin/grading");
}





