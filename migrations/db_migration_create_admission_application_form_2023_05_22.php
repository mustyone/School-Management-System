<?php 
function up(){
    $query = "CREATE TABLE `school_management_system`.`admission_application_form` (`app_number` VARCHAR(100) NOT NULL , `fest_name` TEXT NOT NULL , `midle_name` TEXT NOT NULL , `last_name` TEXT NOT NULL , `address` TEXT NOT NULL , `date_of_birth` DATE NOT NULL , `nationality` VARCHAR(100) NOT NULL , `sex` VARCHAR(2) NOT NULL , `religion` VARCHAR(20) NOT NULL , `state_of_origin` VARCHAR(20) NOT NULL , `l_g_a` VARCHAR(50) NOT NULL ) ENGINE = InnoDB";

    return $query;
}

function down(){
    $query = "DROP TABLE `school_management_system`.`admission_application_form`";

    return $query;
}