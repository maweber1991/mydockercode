<?php
session_start(); 



if(isset($_SESSION['username']))
{
	unset($_SESSION['username']);

	if(isset($_COOKIE['cook_username']) && isset($_COOKIE['cook_pwd']))
	{
		  setcookie("cook_username", "", time()-60*60*24*100, "/");
      	  setcookie("cook_pwd", "", time()-60*60*24*100, "/");
		   setcookie("cook_user_id", "", time()-60*60*24*100, "/");
	}

	header("Location: login.php");
	exit;
}
header("Location: login.php");
exit;
?>