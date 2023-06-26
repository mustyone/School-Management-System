<?php 
function up(){
    $query ="ALTER TABLE `admission_application_form` ADD `class_id` INT NOT NULL AFTER `app_number`";
    return $query;
}
function down(){
    $query = "DROP TABLE `school_management_system`.`admission_application_form`";

    return $query;
}