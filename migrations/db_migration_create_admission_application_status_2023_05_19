<?php 
function up(){

    $query = "CREATE TABLE `school_management_system`.`admission_application_status` (`app_number` VARCHAR(100) NOT NULL , `status` ENUM('admitted','rejected') NOT NULL , `session_admitted_to` INT NOT NULL , `class_admitted_to` INT NOT NULL ,'batch_id' INT NOT NULL ) ENGINE = InnoDB";

    return $query;
}


function down(){

    $query = "DROP TABLE `school_management_system`.`admission_application_status`";

    return $query;
}