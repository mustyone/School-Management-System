<?php 
function up(){
    $query = "CREATE TABLE `school_management_system`.`cbt_exam_result` (`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY, `exam_id` INT NOT NULL , `total_score` DOUBLE NOT NULL , `score` DOUBLE NOT NULL , `student_id` VARCHAR(255) NULL , `uniquer_id` VARCHAR(255) NULL ) ENGINE = InnoDB";

    return $query;
}

function down(){
    $query = "DROP TABLE `school_management_system`.`cbt_exam_result`";

    return $query;
}