<?php

/*
   * Millionenshow - Logout
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

session_start(); 


// Wenn eine Session existiert, dann diese Löschen (unset)
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