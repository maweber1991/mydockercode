

<!DOCTYPE HTML PUBLIC "-//W3C//DTD HTML 4.0 Transitional//EN">
<html>
<head>
<title>Login</title>
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<script src="jscripts/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="jscripts/login.js" type="text/javascript"></script>
</head>

<body>
	<div id="background"></div>
	<noscript>
	<div id="nojavascript"><div id="nojavascripttext">Aktivieren Sie JavaScript um ein Quiz starten zu können!</div></div>
	</noscript>
	<div id="login_form">

		<div id="status" align="left">

			<h1> QUIZ-Login </h1>
			<div id="login_response"><!-- spanner --></div> </center>
			<form id="login" action="" method="">
				<input type="hidden" name="action" value="user_login">
				<input type="hidden" name="module" value="login">
				<table width="100%"  border="0" cellpadding="0" cellspacing="0">
					<tr>
						<td>Benutzername:</td>
						<td><input type="text" name="username" value=""></td>
					</tr>
					<tr>
						<td>Passwort:</td>
						<td><input type="password" name="passwort" value=""></td>
					</tr>
					
					<tr>
						<td ><input id="rememberme" value=1 name="rememberme" type="checkbox"/>eingeloggt bleiben?</td>
						<td ><input value="Anmelden" name="Login" id="submit" type="submit" /></td>
					</tr>
					
				</table>
				<div id="ajax_loading">
					<img align="absmiddle" src="images/spinner.gif">&nbsp;Bearbeiten...
				</div>
			</form>
			<div id="fehlermeldung">
			</div>
		</div>

	</div>

	</body>
</html>