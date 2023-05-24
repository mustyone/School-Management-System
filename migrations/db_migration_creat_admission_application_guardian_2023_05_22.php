<?php 
function up(){
    $query = "CREATE TABLE `school`.`admission_application_guardian` (`app_number` VARCHAR(100) NOT NULL , `father_info` JSON NOT NULL , `mother_info` JSON NOT NULL , `guardian_info` JSON NOT NULL , UNIQUE (`app_number`)) ENGINE = InnoDB";

    return $query;
}

function down(){
    $query = "DROP TABLE `school_management_system`.`admission_application_guardian`";

    return $query;
}