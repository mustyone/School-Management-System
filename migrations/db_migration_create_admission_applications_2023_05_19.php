<?php 
function up(){

    $query = "CREATE TABLE `school_management_system`.`admission_applications` (`app_id` INT NOT NULL AUTO_INCREMENT , `app_number` VARCHAR(100) NOT NULL , `batch_id` INT NOT NULL , PRIMARY KEY (`app_id`)) ENGINE = InnoDB";

    return $query;

}
function down(){

    $query = "DROP TABLE `school_management_system`.`admission_applications`";

    return $query;
}