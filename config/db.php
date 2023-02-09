<?php

if(!defined('servername')) define("servername", "localhost");
if(!defined('username')) define("username", "root");
if(!defined('password')) define("password", "");
if(!defined('database')) define("database", "school_management");


$dbc = mysqli_connect(servername,username,password,database);
if(!$dbc){
    echo "Invalid database connection";
    exit();
}
