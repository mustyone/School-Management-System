<?php
require APP_PATH . '/vendor/autoload.php';

include(APP_PATH . '/config/session.php');
include(APP_PATH . '/config/db.php');

extract($_POST);

$picture_path = "";
$multiquery = "";
$i=0;

if (isset($_POST['upload'])) {
    // Get the uploaded file information
    $name = $_FILES['xlfile']['name'];
    $tmp_name = $_FILES['xlfile']['tmp_name'];

    // Check if the uploaded file is an Excel file
    $excelFileExtensions = ['xlsx', 'xls', 'ods'];
    $fileExtension = pathinfo($name, PATHINFO_EXTENSION);

    // Set the target directory for the uploaded file
    $target_dir = APP_PATH . '/assets/uploads/';
    $target_file = $target_dir . basename($name);

    if (!in_array($fileExtension, $excelFileExtensions)) {
        $_SESSION['error'] = "The file you uploaded is not a valid excel file";
        header("Location: /result/admin/newbulkstudent");
    }
    else if (!move_uploaded_file($tmp_name, $target_file)) {
        $_SESSION['error'] = "The file could not be uploaded";
        header("Location: /result/admin/newbulkstudent");
    } else {
        //read excel file

        // Load the Excel file using the Reader class
        $reader = new \PhpOffice\PhpSpreadsheet\Reader\Xlsx();
        $spreadsheet = $reader->load($target_file);


        // Get the active worksheet (i.e. the first worksheet)
        $worksheet = $spreadsheet->getActiveSheet();

        $sheetData = $spreadsheet->getActiveSheet()->toArray();
        // $d=$spreadsheet->getSheet(0)->toArray();

        unset($sheetData[0],$sheetData[1]);

        foreach ($sheetData as $t) {
         // process element here;
            $multiquery .= "INSERT INTO students VALUES ('$t[1]','$t[2]','$t[3]','$t[4]',$class_id,'active','$t[5]','$t[6]',0,'$picture_path');";

            $i++;

        }
    }
}
try {

    $result = mysqli_multi_query($dbc, $multiquery);

    if ($result) {
        $_SESSION['message'] = "{$i} Students record has been uploaded successfully";
        header("location:/result/admin/newbulkstudent");
    } else {
        $_SESSION['error'] = "Error adding student";
        header("location:/result/admin/newbulkstudent");
    }
} catch (\Exception $e) {
    $_SESSION['error'] = "DB Error ";
    header("location:/result/admin/newbulkstudent");
}
