<?php 
function up(){
    $query = "INSERT INTO `admission_pins` (`id`, `pin`, `serial`, `batch_id`, `status`, `app_number`, `user_id`) VALUES 
    ('1', '12B20233', '00000001', '1', 'not-used', '12345', '2') ";

    return $query;
}

function down(){
    $query = "DROP TABLE `school_management_system`.`admission_pins`";

    return $query;
}
