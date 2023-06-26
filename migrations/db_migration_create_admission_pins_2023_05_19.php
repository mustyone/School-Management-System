<?php 
function up(){
    $query = "CREATE TABLE `school_management_system`.`admission_pins` (`id` INT NOT NULL AUTO_INCREMENT , `pin` VARCHAR(50) NOT NULL , `serial` VARCHAR(20) NOT NULL , `batch_id` INT NOT NULL , `status` ENUM('used','not-used') NOT NULL , `app_number` VARCHAR(100) NOT NULL , `user_id` INT NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB";

    return $query;
}
function down(){

    $query = "DROP TABLE `school_management_system`.`admission_pins`";

    return $query;
    
}