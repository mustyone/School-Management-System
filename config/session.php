<?php 

//this will check if the session is not active before it starts a session
//this should fix the warning that session has been started ignoring session_start
if(session_status() !== PHP_SESSION_ACTIVE) session_start();


?>