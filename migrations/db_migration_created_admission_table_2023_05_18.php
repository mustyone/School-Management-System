<?php
function up(){
    $query = "CREATE TABLE `school_management_system`.`admissions` (`id` INT NOT NULL , `name` INT NOT NULL , `title` INT NOT NULL , `status` INT NOT NULL ) ENGINE = InnoDB; ";
    return $query;
}

function down(){
    $query = "DROP TABLE  `school_management_system`.`admissions`";

    return $query;
}