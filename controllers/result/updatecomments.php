<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');

extract($_POST);

$multiquery = "";
$type = $_SESSION['type'];

$count = count($comment_ids);

for ($i = 0; $i < $count; $i++) {
    $multiquery .= "UPDATE comments SET min_score=$min_scores[$i],
    max_score = $max_scores[$i], comment = '$remarks[$i]' 
    WHERE id = $comment_ids[$i];
    ";
}


try{

    $result = mysqli_multi_query($dbc, $multiquery);

    while(mysqli_next_result($dbc)){;}

    $multiquery = "";

    //check if there are new grades added
    if (isset($Aremarks) && count($Aremarks) > 0) {

        for ($i = 0; $i < count($Aremarks); $i++) {
            $multiquery .= "INSERT INTO comments(min_score,max_score,comment,section_id,type)
            VALUES($Amin_scores[$i],$Amax_scores[$i],'$Aremarks[$i]',$section_id, '$type');
            ";
        }

        $result = mysqli_multi_query($dbc, $multiquery);

        while(mysqli_next_result($dbc)){;}

        if ($result) {
            $_SESSION['info'] = "New comments also added";
        }
    }



    if ($result) {
        $_SESSION['message'] = "Record updated successfully";
        header("location:/result/admin/comments");
    } else {
        $_SESSION['error'] = "One or more comments could not be updated";
        header("location:/result/admin/comments");
    }
} catch (\Exception $e) {
    /**@TODO log error to file */
    $_SESSION['error'] = "DB Error".$e->getMessage();
    header("location:/result/admin/comments");
}
