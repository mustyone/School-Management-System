<?php 
function up(){

    $query = "CREATE TABLE `school_management_system`.`admission_batches` (`batch_id` INT NOT NULL AUTO_INCREMENT , `batch_code` VARCHAR(100) NOT NULL , `batch_name` VARCHAR(200) NOT NULL , `session_id` INT NOT NULL , `term_id` INT NULL DEFAULT NULL , `status` ENUM('open','closed') NOT NULL , `start_date` DATE NOT NULL , `end_date` DATE NOT NULL , `require_pin` ENUM('yes','no') NOT NULL , PRIMARY KEY (`batch_id`)) ENGINE = InnoDB";
    
    return $query;

}
function down(){

    $query = "DROP TABLE `school_management_system`.`admission_batchs`";

    return $query;
    
}