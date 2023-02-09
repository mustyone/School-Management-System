<?php
if(!isset($_SESSION['studentRecord'])){
    $_SESSION['error'] = "Your credentials is required";
	header("location: /cbt");
}

