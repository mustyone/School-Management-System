<?php 
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);


if(isset($_SESSION['applicationRecord'])){
    foreach($_POST as $key => $val){
        $_SESSION['applicationRecord']['applicationData'][$key] = $val;
    }

    $_SESSION['old'] = $_SESSION['applicationRecord']['applicationData'];

}



// for parent and guardiant
$fatherInfo = [
    'father_name' => $father_name,
    'father_occupation' => $father_occupation,
    'contact_address' => $contact_address,
    'postal_address' => $postal_address,
    'tel' => $tel,
    'email' => $email

];
$fatherInfo = json_encode($fatherInfo);

$motherInfo = [
    'mother_name' => $mother_name,
    'mother_occupation' => $mother_occupation,
    'contact_address' => $contact_address,
    'postal_address' => $postal_address,
    'tel' => $tel,
    'email' => $email
];
$motherInfo = json_encode($motherInfo);

$guardianInfo = [
    'guardian_name' => $guardian_name,
    'contact_address' => $contact_address,
    'postal_address' => $postal_address,
    'tel' => $tel,
    'email' => $email
];
$guardianInfo = json_encode($guardianInfo);

$app_number = $_SESSION['applicationRecord']['applicationNumber'];

if(isset($_FILES['passport_photograpy'])){
    // for image only 
    $image = $_FILES['passport_photograpy'];

    $originalfilename = $image['name'];
    $splitedstring = explode(".",$originalfilename);

    $extention = ".".$splitedstring[count($splitedstring)-1];

    $path = $_SERVER['DOCUMENT_ROOT']."/assets/uploads/modules/";


    $name = str_replace("/","",$app_number);
    $newimagename = $path.$name.$extention;
    $imagename = $name.$extention;
    $status = move_uploaded_file($image['tmp_name'],$newimagename);


    if(!$status){
        $_SESSION['error'] = "Image Was Not Uploaded Sucessfuly";
        header("location:/admission/newapplication");
        exit();
    }

    $_SESSION['old']['passport_photograpy'] = $imagename;

}

if(isset($pin)){

    $batch_id = $_SESSION['batch_record']['batch_id'];

    $query = "SELECT * FROM admission_pins WHERE batch_id = $batch_id AND  pin ='$pin' AND status = 'not-used'";
    $result = mysqli_query($dbc,$query);


    $numrows = mysqli_num_rows($result);

    if($numrows === 1){
        $record =mysqli_fetch_assoc($result);

        $query = "UPDATE admission_pins SET status='used' WHERE id ='$record[id]'";
        $result = mysqli_query($dbc,$query);

        $affected_rows = mysqli_affected_rows($dbc);
    }

    else
    {
        $_SESSION['error'] = "This Pin Have Been Used";
        header('location:/admission/newapplication');
        exit;
    }




}

$query = "INSERT INTO admission_application_form (app_number,class_id,first_name,middle_name,last_name,address,date_of_birth,nationality,sex,religion,state_of_origin,l_g_a,passport_photograpy) 
    VALUES ('$app_number','$class_id','$first_name','$middle_name','$last_name','$address','$date_of_birth','$nationality','$sex','$religion','$state_of_origin','$l_g_a','$imagename')";
    $result = mysqli_query($dbc,$query);

$numrows = mysqli_affected_rows($dbc);
if($numrows === 1){
    $query = "INSERT INTO admission_application_guardian (app_number,father_info,mother_info,guardian_info) VALUES ('$app_number','$fatherInfo','$motherInfo','$guardianInfo')";
    mysqli_query($dbc,$query);

    $affected = mysqli_affected_rows($dbc);
    if($affected === 1){        
        unset($_SESSION['applicationRecord'], $_SESSION['batch_record'], $_SESSION['old']);
        $_SESSION['message'] = "Registration has been saved successfully";
        header('location:/admission/newapplication');
    }
    else{
        $_SESSION['error'] = "Sorry pls check you guardian form";
        header('location:/admission/newapplication');

    }
}
else{
    $_SESSION['error'] = "Sorry. An error occurred while trying to save the data";
    header('location:/admission/newapplication');
} 