<script type="text/javascript">
{literal}

function showRequest(formData, jqForm, options) {
	if (!$("#editQuestion").validationEngine({returnIsValid:true})) {
		return false;
	}
	//validateFields
  	return true;
}


function showResponse(responseText, statusText)  {
	
	
	if (responseText == "OK") {
		showdialog("Erfolgreich gespeichert",'editQuiz($("#hiddenquizid").val())',"green");

	} else {
		showdialog(responseText,'editQuiz($("#hiddenquizid").val())',"red");
	}
}





$(document).ready(function() 
{	
		$("#editQuestion").validationEngine();
		$("#cancelButton").click( function(e) {
			editQuiz($("#hiddenquizid").val());
			return false;
		});
		
		
     	     			     	     	
     	var options = {

	        beforeSubmit:  showRequest,  // pre-submit callback
	        success:       showResponse  // post-submit callback
	
	    };

	   
	   $('#editQuestion').ajaxForm(options);
	   

	   

	   
}
); 

{/literal}
</script>


<form id="editQuestion" action="contents.php" method="post">
	<input type="hidden" id="action" name="action" value="{$ACTION}">
	<input type="hidden" id="hiddenquizid" name="quizId" value="{$QUIZID}">
	<input type="hidden" id="hiddenfragenr" name="frageNr" value="{$FRAGENR}">
	<table id="editQuestion" cellspacing="1">
		<thead>
			<tr>
				<th colspan="2"><b>Frage editieren</b></th>
			</tr>
		</thead>
		<tbody>
			<tr> 
				<td colspan="2" height="18" valign="middle" class="middle-separator-text"></td>
			</tr> 
			<tr> 
				<td>*Frage:</td>
				<td><textarea class="validate[required] text-input" rows="4" cols="50" id="frage" name="frage">{$post.FRAGE|escape}</textarea>
				</td>
			</tr>
			<tr> 
				<td>*Richtige Antwort:</td>
				<td><textarea class="validate[required] text-input" rows="4" cols="50" id="antwort_richtig" name="antwort_richtig">{$post.ANTWORT_RICHTIG|escape}</textarea>
				</td>
			</tr>
			<tr> 
				<td>*Antwort 2:</td>
				<td><textarea class="validate[required] text-input" rows="4" cols="50" id="antwort_falsch1" name="antwort_falsch1">{$post.ANTWORT_FALSCH1|escape}</textarea>
				</td>
			</tr>
			<tr> 
				<td>*Antwort 3:</td>
				<td><textarea class="validate[required] text-input" rows="4" cols="50" id="antwort_falsch2" name="antwort_falsch2">{$post.ANTWORT_FALSCH2|escape}</textarea>
				</td>
			</tr>
			<tr> 
				<td>*Antwort 4:</td>
				<td><textarea class="validate[required] text-input"  rows="4" cols="50" id="antwort_falsch3" name="antwort_falsch3">{$post.ANTWORT_FALSCH3|escape}</textarea>
				</td>
			</tr>
			<tr>
				<td>*Ebene:</td>
				<td><input class="validate[required,custom[integer],min[1],max[15]]"  id="ebene" type="text" name="ebene" value="{$post.EBENE|escape}"></td>
			</tr>
			<tr> 
				<td colspan="2" style="text-align:right;"><input type="image" name="submitButton" value="Submit" src="images/save.png">&nbsp;&nbsp;&nbsp;<input type="image" id="cancelButton" name="cancelButton" value="Cancel" src="images/cancel.png"></td>
			</tr>
		</tbody>
	</table>
</form>
