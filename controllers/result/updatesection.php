<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');

extract($_POST);
$section_name = ucwords($section_name);
$section_shot_code = strtoupper($section_shot_code);
$query = "UPDATE sections SET section_name='$section_name',section_shot_code='$section_shot_code' WHERE section_id = $section_id";
$result = mysqli_query($dbc,$query);

if(mysqli_affected_rows($dbc) > 0){
    $_SESSION['message'] = "Section have been updated successfully";
    header("location:/result/admin/allsections");
}
else{
    $_SESSION['error'] = "Section record could not be updated";
    header("location:/result/admin/editsection/$section_id");
}

