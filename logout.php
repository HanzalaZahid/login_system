<?php
    session_start();
	session_destroy();
 
	if (isset($_COOKIE["email"]) AND isset($_COOKIE["username"])){
		setcookie("email", '', time() - (3600));
		setcookie("username", '', time() - (3600));
	}
	header("location: login.php");
?>