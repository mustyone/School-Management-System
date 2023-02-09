<?php
include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');

extract($_POST);
$section_name = strtoupper($section_name);
$section_shot_code = strtoupper($section_shot_code);
$query = "INSERT INTO sections(section_name,section_shot_code) VALUES ('$section_name','$section_shot_code')";
$result = mysqli_query($dbc,$query);

if($result){
    $_SESSION['message'] = "Section have been added successfully";
    header("location:/result/admin/allsections");
}
else{
    $_SESSION['message'] = "Error adding section";
    header("location:/result/admin/allsections");
}

