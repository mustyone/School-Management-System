<?php
include('../config/session.php');
include('../config/db.php');

foreach($_POST as $setting_name => $setting_value){
    if($setting_name == 'save') continue;

    $query = "UPDATE settings SET setting_value = '$setting_value' WHERE setting_name = '$setting_name'";
    
    $result = mysqli_query($dbc, $query);
}

$_SESSION['message'] = "Information updated";

header("location:/result/admin/schoolinfo");
