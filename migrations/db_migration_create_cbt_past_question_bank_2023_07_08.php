<?php
function up(){
    $query = "CREATE TABLE `school_management_system`.`cbt_past_question_bank` (`question_bank_id` INT NOT NULL , `exam_type` ENUM('waec','neco','utme') NOT NULL , `year` VARCHAR(100) NOT NULL , `subject` VARCHAR(100) NOT NULL , `subject_id` INT NOT NULL , `question_type` ENUM('single_choice','multiple_choice','boolean','mach','written') NOT NULL , `meta_data` JSON NOT NULL , `past_question_id` INT NOT NULL,`class_id` INT NOT NULL) ENGINE = InnoDB";

    return $query;
}

function down(){
    $query = "DROP TABLE 'schoo_management_system'.'cbt_past_question_bank'";

    return $query;
}