<?php
function up(){

    $query = "CREATE TABLE `school_management_system`.`cbt_question_bank` (`question_id` INT NOT NULL , `question_type` ENUM('multiple choice','sigle choice') NOT NULL , `subject_id` INT NOT NULL , `question` LONGTEXT NOT NULL , `question_metadate` INT NOT NULL , `answer` INT NOT NULL , `grading_type` ENUM('auto','manual') NOT NULL,`class_id` INT NOT NULL ) ENGINE = InnoDB";

    return $query;
}

function down(){
    $query = "DROP TABLE 'school_management_system'.'cbt_question_bank'";

    return $query;
}