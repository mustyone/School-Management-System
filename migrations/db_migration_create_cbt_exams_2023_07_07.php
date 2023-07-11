<?php 
function up(){
    $query = "CREATE TABLE `school_management_system`.`cbt_exams` (`id` INT NOT NULL AUTO_INCREMENT PRIMARY KEY,`status` ENUM('active','inactive') NOT NULL , `question_ids` JSON NULL , `exam_subject_id` JSON NOT NULL , `time_alloted_min` INT NOT NULL , `number_of_question_subject` JSON NOT NULL , `allow_calculator` ENUM('yes','no') NOT NULL ,`instruction` LONGTEXT NOT NULL ,`mark_per_question` JSON NOT NULL , `overallscore` INT NOT NULL , `show_result_per_question` ENUM('yes','no') NOT NULL , `show_result_after_submit` ENUM('yes','no') NOT NULL , `requre_id` ENUM('yes','no') NOT NULL,`class_id` INT NOT NULL ) ENGINE = InnoDB";

    return $query;
}

function down(){

    $query = "DROP TABLE `school_management_system`.`cbt_exams`";

    return $query;
}