<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');

$query = "SELECT * FROM backups WHERE id = $id";
$result = mysqli_query($dbc, $query);
$record = mysqli_fetch_assoc($result);

$filePath = APP_PATH . '/assets/uploads/backups/'.$record['filepath'];

if(unlink($filePath)){

    $query2 = "DELETE FROM backups WHERE id = $id";
    $result2 = mysqli_query($dbc, $query2);

    $_SESSION['message'] = "Backup deleted";

}
else{
    $_SESSION['error'] = "Backup could not be deleted";
}

header("location:/result/admin/backuprecords");

