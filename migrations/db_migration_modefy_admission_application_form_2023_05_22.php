<?php 
function up(){
    $query = "ALTER TABLE `admission_application_form` ADD `passport_photograpy` TEXT NOT NULL AFTER `l_g_a`; ";

    return $query;
}

function down(){

    $query = "DROP TABLE `school_management_system`.`admission_application_previous_record`";

    return $query;
}