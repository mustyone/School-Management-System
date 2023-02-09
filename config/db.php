<?php

if(!defined('servername')) define("servername", "localhost");
if(!defined('username')) define("username", "root");
if(!defined('password')) define("password", "root");
if(!defined('database')) define("database", "resultportal");


$dbc = mysqli_connect(servername,username,password,database);
if(!$dbc){
    echo "Invalid database connection";
    exit();
}
