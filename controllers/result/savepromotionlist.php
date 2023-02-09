<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);

$i = 0;

$multiquery = "";

foreach($student_ids as $student_id){

    $session_average = $session_averages[$i];
    $passing_average = $passing_averages[$i];
    $promotion_status = $promotion_statuses[$i];

    $multiquery .= "INSERT INTO 
    promotion_lists(student_id,from_session_id,to_session_id,from_class_id,to_class_id,session_average,passing_average,promotion_status)
    VALUES('$student_id',$from_session_id,$to_session_id,$from_class_id,$to_class_id,$session_average,$passing_average,'$promotion_status');";

    $i++;
}


try{
    
    $result = mysqli_multi_query($dbc,$multiquery);

    if($result){
        $_SESSION['message'] = "Record saved successfully";
        header("location:/result/admin/preparepromotionlist");
    }
    else{
        $_SESSION['error'] = "Error adding student";
        header("location:/result/admin/preparepromotionlist");
    }
    
    
}
catch(\Exception $e){
    $_SESSION['error'] = "DB Error";
    header("location:/result/admin/preparepromotionlist");
}
