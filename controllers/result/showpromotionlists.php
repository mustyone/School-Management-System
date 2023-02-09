<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');

extract($_POST);

$query = "SELECT * FROM promotion_lists 
         LEFT JOIN students s on promotion_lists.student_id = s.student_id
         WHERE from_class_id = $from_class_id AND to_class_id = $to_class_id AND 
from_session_id = $from_session_id AND to_session_id = $to_session_id";

try {
    $result = mysqli_query($dbc, $query);
    $promotionLists = [];

    while ($row = mysqli_fetch_assoc($result)) {
        //check if the students is registered already
        array_push($promotionLists, $row);
    }
} catch (\Exception $e) {
    /**@TODO log error to file */
    $_SESSION['error'] = "DB Error" . $e->getMessage();
    header("location:/result/admin/promotionlist");
}


$_SESSION['data'] = [
    'from_session_id' => $from_session_id,
    'to_session_id' =>  $to_session_id,
    'from_class_id' => $from_class_id,
    'to_class_id' => $to_class_id,
    'promotionLists' => $promotionLists
];


header("location:/result/admin/promotionlist");
