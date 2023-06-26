<?php 
function up(){
    
    $query = "CREATE TABLE `school_management_system`.`admission_application_previous_record` (`app_number` VARCHAR(100) NOT NULL , `last_class_attended` INT(50) NOT NULL , `class_applied_for` INT NOT NULL , `last_school_attended` VARCHAR(255) NOT NULL , `date_of_leaving` DATE NOT NULL , `No._on_transfer_certificate` VARCHAR(200) NOT NULL , `choice_of_school` ENUM('day','boarding') NOT NULL , `hobbies` TEXT NOT NULL , UNIQUE (`app_number`)) ENGINE = InnoDB";

    return $query;
}

function down(){

    $query = "DROP TABLE `school_management_system`.`admission_application_previous_record`";

    return $query;
}