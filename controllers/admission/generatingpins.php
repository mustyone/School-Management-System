<?php 
include(APP_PATH . '/config/session.php');
include(APP_PATH.'/config/db.php');

extract($_POST);
$query = "SELECT * FROM admission_batches WHERE batch_id ='$batch_id'";
$result = mysqli_query($dbc,$query);
$row = mysqli_fetch_assoc($result);
$batch = $row['batch_code'];

$query = "SELECT MAX(id) AS max_id FROM admission_pins";
$result = mysqli_query($dbc,$query);
$row = mysqli_fetch_assoc($result);
$maxID = $row['max_id'];


if($length_of_pin >= 8){
    
    $numbers = [0,1,2,3,4,5,6,7,8,9];         
    $pins = [];
    $serialNumbers = [];

    $letters = ['a','A','b','B','c','C','d','D','e','E','f','F','g','G','h','H','i','I','j','J','k','K','l','L','m','M','n','N','o','O','p','P','q','Q','r','R','s','S','t','T','u','U','v','V','w','W','x','X','y','Y','z','Z'];
    
    if($include_alphabate  === 'on'){
        $combination = array_merge($numbers,$letters);
         shuffle($combination);
            for($a =0; $a < $number_of_pins; $a++){
                $pin = "";
                for($i = 0; $i < $length_of_pin; $i++){

                    $index = random_int(0,count($combination));
                    $pin .= $combination[$index];
    
                }
                $serialNumbers[] = "SN".str_pad(++$maxID, $length_of_pin,'0',STR_PAD_LEFT);
                $pins[] = $pin;
            }
            
    }
    else{
        for($a=0; $a < $number_of_pins; $a++){
            $pin = "";
            shuffle($numbers);

            for($i = 0; $i < $length_of_pin; $i++){
                $index = random_int(0,count($numbers));
                $pin .= $numbers[$index];

            }


            $pins[] = $pin;
            $serialNumbers[] = "SN".str_pad(++$maxID, $length_of_pin,'0',STR_PAD_LEFT);

        }   


    }
   

    $query = "";
    for($a =0; $a < count($pins); $a++){
        $query .= "INSERT INTO admission_pins (pin,serial,batch_id,status) VALUES ('$pins[$a]','$serialNumbers[$a]','$batch_id','not-used');";
    }
    $result = mysqli_multi_query($dbc,$query);
    
    $_SESSION['message'] = "Pin Have Been Generated";
    header("location:/admission/generatepin");
}
else{
    $_SESSION['error'] = "sorry length of pin can not be less than 8";
    header("location:/admission/generatepin");
}
