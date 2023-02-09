<?php
include "../../config/db.php";

$score = $_GET['score'];
$section_id = $_GET['section_id'];

$query = "SELECT * FROM grades WHERE grade_section_id = $section_id 
AND $score >= grade_min_score AND $score <= grade_max_score";

try{
    $result = mysqli_query($dbc,$query);
    $num_rows = mysqli_num_rows($result);
    
    if($num_rows == 1){
        $record = mysqli_fetch_assoc($result);
        // echo $record['grade_char'];
        $output =  [
            'grade' => $record['grade_char'],
            'remark' => $record['grade_remark']
        ];
    
        echo json_encode($output);
    }
    else{
        echo "NG";
    }
}
catch(\Exception $e){
    $output =  [
        'error' => $e->getMessage(),
    ];

    echo json_encode($output);
}
