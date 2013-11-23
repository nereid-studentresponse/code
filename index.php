<?php
	session_start();
	header('Content-type: text/html; charset=utf-8');
	
	if ( isset($_SESSION['login']) )
	{
		$error = "<p>You are already connected with pseudo <span class='bold'>" . htmlspecialchars($_SESSION['login'], ENT_QUOTES)."</span></p>";
    
		require_once('viewIndexConnected.php');
		exit();
	}
	else if ( isset($_POST['login']) ) // if the request is a post one
	{
		if ( $_POST['login'] ==  "international" AND $_POST['password'] == "project" ) // if password is ok
		{	
			$_SESSION['login'] = $_POST['login'];
            $_SESSION['password'] = $_POST['password'];
            unset($_SESSION['connexion_login']);

			// redirection
			header('Location: courses.php');
		} else {
			$_SESSION['connexion_login'] = $_POST['login'];
			$error = "<p>Login and password unknown. Please retry.</p>";
			require_once('viewIndex.php');
		}
	}
	else // display the welcome page
	{
		$error = "";
		require_once('viewIndex.php');
	}
	
?>