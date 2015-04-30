<?php 

error_reporting(E_ALL ^ E_NOTICE);

//Initialize session
ini_set('session.gc_maxlifetime', 14400);
ini_set('session.gc_divisor', 1);

session_id();
session_start();

header('Cache-control: private'); // IE 6 FIX

if ($_SESSION['username']) {
  	header("Location: index.php");
	exit;
}
else {
   	if(isset($_COOKIE['cook_username']) && isset($_COOKIE['cook_pwd'])){
	      $user = $_COOKIE['cook_username'];
	      $password = $_COOKIE['cook_pwd'];
	      $_SESSION['username'] = $user;
		  $_SESSION['user_id'] = $_COOKIE['cook_user_id'];
		  $_SESSION['is_admin'] = $_COOKIE['cook_is_admin'];;
	      header("Location: index.php");
		  exit;
    } else {
    	header("Location: login.php");
		exit;
    }
    
}
?>