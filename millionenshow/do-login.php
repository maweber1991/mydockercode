<?php

error_reporting(E_ALL ^ E_NOTICE);


session_id();
session_start();
header('Cache-control: private'); // IE 6 FIX

if($_POST['action'] == 'user_login')
{
	$username = $_POST['username'];
	$passwort = $_POST['passwort'];
	$passwortMd5 = md5($_POST['passwort']);
	$rememberme = ($_POST['rememberme']);

	// check username and passwort
	$userdata = Authorize($username, $passwortMd5);
	
	if(isset($userdata)) { 

			
		$_SESSION['username'] = $username;
		$_SESSION["user_id"] = $userdata["USER_ID"]; 
		$_SESSION["is_admin"] = $userdata["IS_ADMIN"]; 
		
		
		$_SESSION['isLoggedIn'] = true;
		
		if($rememberme)
		{
			// set the cookies for 1 month
				setcookie("cook_username", $username, time()+60*60*24*14, "/");
				setcookie("cook_user_id", $userdata["USER_ID"], time()+60*60*24*14, "/");
				setcookie("cook_pwd", $passwort, time()+60*60*24*14, "/");
				setcookie("cook_is_admin", $userdata["IS_ADMIN"], time()+60*60*24*14, "/");
		}
		echo 'OK'; 	

			
	}
	else 
	{
		$auth_error = '<div id="notification_error">Login ist fehlgeschlagen!</div>';
		echo $auth_error;
	}
}

function Authorize($username, $passwortMd5)
{
	require_once("constants.php");
	require_once("db.class.php");

	$db = new DB(DB_DATABASE, DB_SERVER, DB_USER, DB_PASS);
	$query = "SELECT * FROM users WHERE username = '" . $username . "' 
		AND passwort = '" . $passwortMd5 . "'";
	$result = $db->query($query);
	$userdata = $db->fetchNextRowArray($result, MYSQL_ASSOC);
	
	
	if (!empty($userdata))
        return $userdata;	
    else
	    return null;
}
?>