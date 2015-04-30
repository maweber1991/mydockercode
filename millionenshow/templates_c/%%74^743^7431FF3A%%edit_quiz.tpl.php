<?php /* Smarty version 2.6.26, created on 2015-04-29 15:09:25
         compiled from edit_quiz.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'edit_quiz.tpl', 81, false),)), $this); ?>
<script type="text/javascript">
<?php echo '

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
	$.post("contents.php",{\'action\':\'viewadminquestions\',\'quizId\':$("#hiddenquizid").val()},function(data){
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

	   
	   $(\'#editQuiz\').ajaxForm(options);
	   
	   loadTableQuestions();
	   

	   
}
); 

'; ?>

</script>


<form id="editQuiz" action="contents.php" method="post">
	<input type="hidden" id="action" name="action" value="<?php echo $this->_tpl_vars['ACTION']; ?>
">
	<input type="hidden" id="hiddenquizid" name="quizId" value="<?php echo $this->_tpl_vars['QUIZID']; ?>
">
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
				<td><input class="validate[required] text-input" id="bezeichnung" type="text" name="bezeichnung" value="<?php echo ((is_array($_tmp=$this->_tpl_vars['post']['BEZEICHNUNG'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
"></td>
			</tr>
			<tr> 
				<td>Beschreibung:</td>
				<td><textarea rows="4" cols="50" id="beschreibung" name="beschreibung"><?php echo ((is_array($_tmp=$this->_tpl_vars['post']['BESCHREIBUNG'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</textarea>
				</td>
			</tr>
			<?php if ($this->_tpl_vars['ACTION'] == 'editquizsubmit'): ?>
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
			<?php endif; ?>
			<tr> 
				<td colspan="2" style="text-align:right;"><input type="image" name="submitButton" value="Submit" src="images/save.png">&nbsp;&nbsp;&nbsp;<input type="image" id="cancelButton" name="cancelButton" value="Cancel" src="images/cancel.png"></td>
			</tr>
		</tbody>
	</table>
</form>