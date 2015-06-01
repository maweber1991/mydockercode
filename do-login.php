<?php
/*
   * Millionenshow - Do-Login
   * 2015, Weber Manuel
   *
   *  This program is free software: you can redistribute it and/or modify
   *  it under the terms of the GNU General Public License as published by
   *  the Free Software Foundation, either version 3 of the License, or
   *  (at your option) any later version.
   *
   *  This program is distributed in the hope that it will be useful,
   *  but WITHOUT ANY WARRANTY; without even the implied warranty of
   *  MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE.  See the
   *  GNU General Public License for more details.
   *
   *  You should have received a copy of the GNU General Public License
   *  along with this program.  If not, see <http://www.gnu.org/licenses/>.
   * 
*/
error_reporting(E_ALL ^ E_NOTICE);


session_id();
session_start();
header('Cache-control: private'); // IE 6 FIX

//Login-Formular wird an diese Datei gesendet. Hier wird der Login geprüft und durchgeführt.

if($_POST['action'] == 'user_login')
{
	$username = $_POST['username'];
	$passwort = $_POST['passwort'];
	$passwortMd5 = md5($_POST['passwort']);
	$rememberme = ($_POST['rememberme']);

	// Benutzername und Passwort prüfen
	$userdata = Authorize($username, $passwortMd5);
	
	if(isset($userdata)) { 

			
		$_SESSION['username'] = $username;
		$_SESSION["user_id"] = $userdata["USER_ID"]; 
		$_SESSION["is_admin"] = $userdata["IS_ADMIN"]; 
		
		
		$_SESSION['isLoggedIn'] = true;
		
		if($rememberme)
		{
			// Cookie für ein Monat setzen
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
//Diese Funktion prüft ob der Benutzer mit dem Passwort in der Datenbank gespeichert ist
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