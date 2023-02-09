if(!defined('servername')) define("servername", "localhost");
if(!defined('username')) define("username", "{YOUR_DB_USERNAME}");
if(!defined('password')) define("password", "{YOUR_DB_PASSWORD}");
if(!defined('database')) define("database", "{DB_NAME}");


$dbc = mysqli_connect(servername,username,password,database);
if(!$dbc){
    echo "Invalid database connection";
    exit();
}
