<?php
	session_start();
	
	unset($_SESSION['login']);
    unset($_SESSION['password']);
	
	$informations = "You are now logged out. To log in, <a href='index.php'>click here</a>";
	
	require_once('logoutView.php');
	exit();
?>