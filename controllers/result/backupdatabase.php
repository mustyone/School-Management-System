<?php
include(APP_PATH.'/config/session.php');
include(APP_PATH.'/config/db.php');
require APP_PATH . '/vendor/autoload.php';

$fileName = "DB_Backup_". date("Y")."_".date("m")."_".date("d")."_" . date("his") . ".sql";
use Ifsnop\Mysqldump as IMysqldump;
try{
    $backup_file =  APP_PATH . '/assets/uploads/backups/'.$fileName;
    $host = servername;
    $database = database;
    $user = username;
    $password = password;

    $dumpSettings = [
      'if-not-exists' => true
    ];
    $dump = new IMysqldump\Mysqldump("mysql:host=$host;dbname=$database", "$user", "$password");
    $dump->start($backup_file);

    $query = "INSERT INTO backups(created_at,filepath,tag) VALUES(NOW(),'$fileName','$_POST[tag]')";
    $result = mysqli_query($dbc, $query);
    if ($result) {
        $_SESSION['message'] = "Backup completed";
    } else {
        $_SESSION['error'] = "Backup not completed";
    }

}
catch (Exception $e){
    $_SESSION['error'] = "DB Error" . $e->getMessage();
}

header("Location: /result/admin/newbackup");
