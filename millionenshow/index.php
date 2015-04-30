<?

error_reporting(E_ALL ^ E_NOTICE);

session_id();
session_start();
$admin = false;
if(isset($_SESSION['is_admin']) && $_SESSION['is_admin']== 1){
		$admin = true;
}


if(!isset($_SESSION['username']))
{
	header("Location: autologin.php");
	exit;
}
else
{
 
}

?>
<!DOCTYPE html PUBLIC "-//W3C//DTD XHTML 1.0 Transitional//EN" "http://www.w3.org/TR/xhtml1/DTD/xhtml1-transitional.dtd">
<html xmlns="http://www.w3.org/1999/xhtml">
<meta http-equiv="content-type" content="text/html; charset=UTF-8">
<head>
<title>Startseite</title>
<link rel="shortcut icon" href="favicon.ico">
<link rel="stylesheet" href="css/style.css" type="text/css" media="all" />
<link rel="stylesheet" href="css/validationEngine.jquery.css" type="text/css" media="all" />


<script src="jscripts/jquery-1.11.2.min.js" type="text/javascript"></script>
<script src="jscripts/jquery.form.min.js" type="text/javascript"></script>
<script src="jscripts/jquery.validationEngine.js" type="text/javascript"></script>
<script src="jscripts/jquery.validationEngine-de.js" type="text/javascript"></script>
<script src="jscripts/myscript.js" type="text/javascript"></script>

<script src="jscripts/ParseQuery.js" type="text/javascript"></script>

<script type="text/javascript"> 
	var aktCallbackFunction = "";
	var aktArgs;
	var wait = 1000;
	var quizWait = 1000;
	var waitNext = 500;
	function executeFunctionByName(functionName, context, arguments) {
		
		var args = Array.prototype.slice.call(arguments).splice(1, arguments.length);

		var namespaces = functionName.split(".");
		var func = namespaces.pop();
		for(var i = 0; i < namespaces.length; i++) {
			context = context[namespaces[i]];
			
		}
		return context[func].apply(this, args);
	}

	function dialogSetStandard(){
		$("#dialogbuttons").html('<input type="image" id="okdialog" name="okdialog" value="Cancel" src="images/cancel.png">');
		aktCallbackFunction = "";
		$("#dialog").css({'border-color': 'red'});
	}
	
	
	function showdialog(text,callbackFunction,color){
		aktCallbackFunction = callbackFunction;
		$("#dialog").css({'border-color': color});
		$("#dialogtext").html(text);
		$("#okdialog").click( function(e) {
			$("#background_dialog").hide();
			$("#dialog").hide();
			
			eval(aktCallbackFunction);
			dialogSetStandard();
			return false;
		});
		$("#background_dialog").show();
		$("#dialog").show();
	}
	
	$(document).ready(function() { 

		$.post("contents.php",{'action':'viewadministratorlinks'},function(data){
			$("#navigation").html(data);	
		});
		
		$("#cancelButton").click( function(e) {
			startseiteAnzeigen();
			return false;
		});
		
		
		$(".all, .navigation").on("click","a.internal",function(){
			var post_url = $(this).attr('href');
			if (post_url.indexOf('http://') != -1) {
				 var lastSlash = post_url.lastIndexOf("/");
				 if (lastSlash != -1) {
					post_url = post_url.substr(lastSlash + 1);
				 }
			}
			
			post_url = "?" + post_url;
			var qry = new PageQuery(post_url);
			var params = qry.ParamValues;
			var args = qry.GetParamsIntoArray();
			var functionName = qry.GetValue("path");
		
			if (functionName){
				try{
					executeFunctionByName(functionName, window, args);
				}
				catch(err) {
				}
			}

			return false;
			
		});
		
		dialogSetStandard();
		$("#okdialog").click( function(e) {
			$("#background_dialog").hide();
			$("#dialog").hide();
			
			eval(aktCallbackFunction);
			dialogSetStandard();
			return false;
		});
		
		
		
		
	});


</script>


</head>
<body>
<div id="background"></div>
<div id="background_loading">
	<div id="loading">	
		<img src="images/ladebalken.gif"></img>
	</div>
</div>

<div id="waiting">	
		<div id="waiting1" class="waiting_class">
			<img src="images/bullet_white.png"></img>
		</div>
		<div id="waiting2" class="waiting_class">
			<img src="images/bullet_white.png"></img>
		</div>
		<div id="waiting3" class="waiting_class">
			<img src="images/bullet_white.png"></img>
		</div>
		<div id="waiting4" class="waiting_class">
			<img src="images/bullet_white.png"></img>
		</div>
		<div id="waiting5" class="waiting_class">
			<img src="images/bullet_white.png"></img>
		</div>
		<div id="waiting6" class="waiting_class">
			<img src="images/bullet_white.png"></img>
		</div>
</div>
<div id="background_dialog"></div>
<div id="dialog">	
		<div id="dialogtext">
			Dialogtext
		</div>
		<div id="dialogbuttons">
		
		</div>
</div>


<noscript>
<div id="nojavascript"><div id="nojavascripttext">Aktivieren Sie JavaScript um ein Quiz starten zu können!</div></div>
</noscript>
<div id="navigation_all" class="navigation">
	<div id="navigation" class="navigation"></div>
</div>
<div id="all" class="all">
	
	<?
		if (isset($_GET['page'])){
			include($_GET['page']);
		
		}
		else{
		
			$_POST['action'] = 'isactivequiz';
			
			include('contents.php');
		}
	?>
</div>





</body>
</html>