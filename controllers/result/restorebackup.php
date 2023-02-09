<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');
require APP_PATH . '/vendor/autoload.php';

$name = $_FILES['sqlFile']['name'];
$tmp_name = $_FILES['sqlFile']['tmp_name'];

// Check if the uploaded file is an Excel file
$excelFileExtensions = ['sql'];
$fileExtension = pathinfo($name, PATHINFO_EXTENSION);

// Set the target directory for the uploaded file
$target_dir = APP_PATH . '/assets/uploads/temp/';
$target_file = $target_dir . basename($name);

if (!in_array($fileExtension, $excelFileExtensions)) {
    $_SESSION['error'] = "The file you uploaded is not a valid database file";
    header("Location: /result/admin/restorebackup");
}
else if(!move_uploaded_file($tmp_name, $target_file)) {
    $_SESSION['error'] = "The file could not be uploaded";
    header("Location: /result/admin/restorebackup");
}
else{
    $query = "SHOW TABLES";

    $result = mysqli_query($dbc, $query);

    $truncateQuery = "";
    while($row = mysqli_fetch_array($result)){
        $truncateQuery .= "DROP TABLE {$row[0]};";
    }

    //Drop all tables
    $result=mysqli_multi_query($dbc,$truncateQuery);
    while(mysqli_next_result($dbc)){;}


}
try{
    $query = file_get_contents($target_file);

    //Run the query
    $result = mysqli_multi_query($dbc, $query);
    while(mysqli_next_result($dbc)){;}

    if($result){
        $_SESSION['message'] = "Database restored";
        header("Location: /result/admin/restorebackup");
    }
    else{
        $_SESSION['error'] = "Database could not be restored";
        header("Location: /result/admin/restorebackup");
    }

}
catch (Exception $e){
    $_SESSION['error'] = "DB Error" . $e->getMessage();
    header("Location: /result/admin/restorebackup");

} finally {
    unlink($target_file);
}

