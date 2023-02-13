<?php

function up()
{
    $query = "
    CREATE TABLE `school_management_system`.`migrations` (`id` INT NOT NULL AUTO_INCREMENT , `file` VARCHAR(400) NOT NULL UNIQUE, `status` VARCHAR(100) NOT NULL , `created_at` DATE NOT NULL , PRIMARY KEY (`id`)) ENGINE = InnoDB;
    ";

    return $query;
}


function down()
{
    $query = "
    DROP TABLE `school_management_system`.`migrations`
    ";

    return $query;
}