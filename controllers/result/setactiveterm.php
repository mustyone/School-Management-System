<?php
include('../config/session.php');
include('../config/db.php');

$term = $_POST['term'];
$query = "UPDATE settings SET setting_value=$term WHERE setting_name='active_term'";
$result = mysqli_query($dbc, $query);


if($result){
    $_SESSION['message'] = "Term has been set to active";
    header("location:/pages/admin/session.php");
}
else{
    $_SESSION['message'] = "Error!! no term was made active";
    header("location:/pages/admin/session.php");
}
