<?php
if(!isset($_SESSION['loggedIn'])){
    $_SESSION['error'] = "Login credentials is required";
	header("location: / ");
}

