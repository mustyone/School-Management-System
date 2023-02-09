<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');

extract($_POST);
$test_nameOriginal = $test_name;
$test_name = strtolower(trim(str_replace(" ", "", $test_name)));
$test_lock = "{$test_name}/{$section_id}/{$session_id}/{$term_id}";


//check for previous scores
$query  = "SELECT SUM(test_score) AS total_score FROM tests WHERE test_section_id=$section_id AND test_session_id=$session_id AND test_term=$term_id";
$result = mysqli_query($dbc, $query);
$row = mysqli_fetch_assoc($result);
$total_score = 0;
if (!is_null($row['total_score']) && !empty($row['total_score'])) {
    $total_score = $row['total_score'];
}

$new_score = $test_score + $total_score;
if ($total_score == 100) {
    $_SESSION['warning'] = "Total assement score is already 100";
    header("location:/result/admin/newassesment");
} else if ($new_score > 100) {
    $_SESSION['warning'] = "Total test score is more than 100";
    header("location:/result/admin/newassesment");
} else {
    $query = "INSERT INTO tests(test_name,test_score,test_lock,test_section_id,test_order,test_session_id,test_term) 
    VALUES ('$test_nameOriginal','$test_score','$test_lock','$section_id','$test_order','$session_id','$term_id')";
    $reuslt = mysqli_query($dbc, $query);
    if ($reuslt) {
        $_SESSION['message'] = "{$test_name} have been added successfully";
        header("location:/result/admin/allassesments");
    } else {
        $_SESSION['error'] = "Error adding test";
        header("location:/result/admin/newassesment");
    }
}
