<?php 
function up(){
    $query = "CREATE TABLE `school_management_system`.`admission_requirements` (`batch_id` INT NOT NULL , `requirement` TEXT NOT NULL ) ENGINE = InnoDB";

    return $query;
}

function down(){

    $query = "DROP TABLE `school_management_system`.` admission_requirements`";

    return $query;
   
}