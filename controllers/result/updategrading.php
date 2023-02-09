<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');

extract($_POST);

$multiquery = "";

$numberOfGrades = count($grade_ids);

for ($i = 0; $i < $numberOfGrades; $i++) {
    $multiquery .= "UPDATE grades SET grade_char='$grades[$i]', grade_min_score=$min_scores[$i],
    grade_max_score = $max_scores[$i], grade_remark = '$remarks[$i]' 
    WHERE grade_id = $grade_ids[$i];
    ";
}


try{
    $result = mysqli_multi_query($dbc, $multiquery);

    while(mysqli_next_result($dbc)){;}


    $multiquery = "";

    //check if there are new grades added
    if (isset($Agrades) && count($Agrades) > 0) {

        for ($i = 0; $i < count($Agrades); $i++) {
            $multiquery .= "INSERT INTO grades(grade_char,grade_min_score,grade_max_score,grade_remark,grade_section_id)
            VALUES('$Agrades[$i]',$Amin_scores[$i],$Amax_scores[$i],'$Aremarks[$i]',$section_id);
            ";
        }

        $result = mysqli_multi_query($dbc, $multiquery);

        while(mysqli_next_result($dbc)){;}

        if ($result) {
            $_SESSION['info'] = "New grades also added";
        }
    }



    if ($result) {
        $_SESSION['message'] = "Record updated successfully";
        header("location:/result/admin/grading");
    } else {
        $_SESSION['error'] = "One or more grades could not be updated";
        header("location:/result/admin/grading");
    }
} catch (\Exception $e) {
    /**@TODO log error to file */
    $_SESSION['error'] = "DB Error".$e->getMessage();
    header("location:/result/admin/grading");
}
