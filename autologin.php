

<?php 

/*
   * Millionenshow - Autologin
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

//Session initialisieren 
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
	//Wenn Cookies gesetzt sind, dann diese als Session starten
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