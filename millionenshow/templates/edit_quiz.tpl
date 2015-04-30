<script type="text/javascript">
{literal}

function showRequest(formData, jqForm, options) {
	
	//validateFields
  	return true;
}


function showResponse(responseText, statusText)  {
	
	if (!$("#editQuiz").validationEngine({returnIsValid:true})) {
		return false;
	}
	if (responseText == "OK") {
		showdialog("Erfolgreich gespeichert","viewAdminQuizes()","green");
		
	} else {
		showdialog(responseText,"viewAdminQuizes()","red");			
	}
}

function loadTableQuestions(){
	$("#questions").html("");
	$.post("contents.php",{'action':'viewadminquestions','quizId':$("#hiddenquizid").val()},function(data){
			$("#questions").html(data);	
		});
}



$(document).ready(function() 
{	

		$("#editQuiz").validationEngine();
		
		$("#cancelButton").click( function(e) {
			viewAdminQuizes();
			return false;
		});
		
		
     	     			     	     	
     	var options = {

	        beforeSubmit:  showRequest,  // pre-submit callback
	        success:       showResponse  // post-submit callback
	
	    };

	   
	   $('#editQuiz').ajaxForm(options);
	   
	   loadTableQuestions();
	   

	   
}
); 

{/literal}
</script>


<form id="editQuiz" action="contents.php" method="post">
	<input type="hidden" id="action" name="action" value="{$ACTION}">
	<input type="hidden" id="hiddenquizid" name="quizId" value="{$QUIZID}">
	<table id="editQuiz" cellspacing="1">
		<thead>
			<tr>
				<th colspan="2"><b>Quiz editieren</b></th>
			</tr>
		</thead>
		<tbody>
			<tr> 
				<td colspan="2" height="18" valign="middle" class="middle-separator-text">Quizdaten</td>
			</tr> 
			<tr> 
				<td>*Quizname:</td>
				<td><input class="validate[required] text-input" id="bezeichnung" type="text" name="bezeichnung" value="{$post.BEZEICHNUNG|escape}"></td>
			</tr>
			<tr> 
				<td>Beschreibung:</td>
				<td><textarea rows="4" cols="50" id="beschreibung" name="beschreibung">{$post.BESCHREIBUNG|escape}</textarea>
				</td>
			</tr>
			{if $ACTION == 'editquizsubmit'}
			<tr>
				<td colspan="2">
					<h2>Fragen:</h2>
				</td>
			</tr>
			<tr>
				<td colspan="2">
					<div id="questions">
					</div>
				</td>
			</tr>
			{/if}
			<tr> 
				<td colspan="2" style="text-align:right;"><input type="image" name="submitButton" value="Submit" src="images/save.png">&nbsp;&nbsp;&nbsp;<input type="image" id="cancelButton" name="cancelButton" value="Cancel" src="images/cancel.png"></td>
			</tr>
		</tbody>
	</table>
</form>
