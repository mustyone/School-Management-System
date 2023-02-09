<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');

extract($_POST);

$multiquery = "";

$count = count($Aremarks);
$type = $_SESSION['type'];
for ($i=0; $i < $count; $i++) { 
    $multiquery .= "INSERT INTO comments(min_score,max_score,comment,section_id,type)
    VALUES($Amin_scores[$i],$Amax_scores[$i],'$Aremarks[$i]',$section_id, '$type');
    ";
}

try{
    $result = mysqli_multi_query($dbc,$multiquery);

    if($result){
        $_SESSION['message'] = "Record saved successfully";
        header("location:/result/admin/comments");
    }
    else{
        $_SESSION['error'] = "One or more comments could not be saved";
        header("location:/result/admin/comments");
    }

}
catch(\Exception $e){
    /**@TODO log error to file */
    $_SESSION['error'] = "DB Error" . $e->getMessage();
    header("location:/result/admin/comments");
}





