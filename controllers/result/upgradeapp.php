<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');
require APP_PATH . '/vendor/autoload.php';

ini_set('memory_limit',"512M");
ini_set('max_execution_time',"300"); //5 minutes
ini_set("post_max_size","500M");
ini_set("upload_max_filesize","400M");
    
    
$name = $_FILES['sqlFile']['name'];
$tmp_name = $_FILES['sqlFile']['tmp_name'];

// Check if the uploaded file is an Excel file
$excelFileExtensions = ['zip'];
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
    //set new memory limits


    //unzip the files and copy and overwrite existing ones
    $zip = new ZipArchive();

    $fileOpened = $zip->open($target_file);

    $path = APP_PATH;

    if($fileOpened){
        // extract it to the path we determined above
        $zip->extractTo($path);
        $zip->close();

        $appVersion = constant();
        
        //update the database if there is a new file in migrations
        
        
        
        $_SESSION['message'] = "Error: Archive unreadable";
        header("Location: /result/admin/upgradeapp");

    }
    else{

    }
}


