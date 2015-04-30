<script type="text/javascript">
{literal}

function showRequest(formData, jqForm, options) {
	
	if (!$("#editUser").validationEngine({returnIsValid:true})) {
		return false;
	}
	
	return true;
}


function showResponse(responseText, statusText)  {
	
	
	if (responseText == "OK") {
		showdialog("Erfolgreich gespeichert","viewAdminUsers()","green");
	} else {
		showdialog(responseText,"viewAdminUsers()","red");			
	}
}



$(document).ready(function() 
{	
		$("#editUser").validationEngine();
		$("#cancelButton").click( function(e) {
			viewAdminUsers();
			return false;
		});
		
		
     	     			     	     	
     	var options = {

	        beforeSubmit:  showRequest,  // pre-submit callback
	        success:       showResponse  // post-submit callback
	
	    };

	   
	   $('#editUser').ajaxForm(options);
	   
	   
}
); 

{/literal}
</script>


<form id="editUser" action="contents.php" method="post">
	<input type="hidden" id="action" name="action" value="{$ACTION}">
	<input type="hidden" id="hiddenuserid" name="userid" value="{$USERID}">
	<table id="editUser" cellspacing="1">
		<thead>
			<tr>
				<th colspan="2"><b>User editieren</b></th>
			</tr>
		</thead>
		<tbody>
			<tr> 
				<td colspan="2" height="18" valign="middle" class="middle-separator-text">Userdaten</td>
			</tr> 
			<tr> 
				<td>*Username:</td>
				<td><input class="validate[required] text-input"  id="username" type="text" name="username" value="{$post.USERNAME|escape}"></td>
			</tr>
			<tr> 
				<td>*Passwort:</td>
				<td><input class="validate[required] text-input"  type="passwort" id="password" name="passwort" value=""></td>
			</tr>
			<tr> 
				<td>*Email:</td>
				<td><input type="text" class="validate[required,custom[email]] text-input" id="email" name="email" value="{$post.EMAIL|escape}"></td>
			</tr> 
			<tr> 
				<td>Adminstrator</td>
				<td><input type="checkbox" id="is_admin" name="is_admin" {if $post.IS_ADMIN == 1}checked{/if}></td>
			</tr> 
				
			<tr> 
				<td colspan="2" style="text-align:right;"><input type="image" name="submitButton" value="Submit" src="images/save.png">&nbsp;&nbsp;&nbsp;<input type="image" id="cancelButton" name="cancelButton" value="Cancel" src="images/cancel.png"></td>
			</tr>
		</tbody>
	</table>
</form>