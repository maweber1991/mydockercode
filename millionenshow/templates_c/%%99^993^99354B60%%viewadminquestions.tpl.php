<?php /* Smarty version 2.6.26, created on 2015-04-29 14:23:45
         compiled from viewadminquestions.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'viewadminquestions.tpl', 42, false),array('modifier', 'escape', 'viewadminquestions.tpl', 43, false),)), $this); ?>
<script type="text/javascript">
<?php echo '
function removeQuestion(quizId,frageNr){
		$.post("contents.php",{\'action\':\'deletequestion\',\'quizId\': quizId,\'frageNr\':frageNr},function(data){	
			if (data == "OK") {
				
				showdialog("Frage wurde erfolgreich gelöscht!","loadTableQuestions()","green");
			}
			else{
				showdialog(data,"loadTableQuestions()","red");
			}
			
			
		});
}

function newQuestion_local(){
		newQuestion($("#hiddenquizid").val());
}

$(document).ready(function() 
{		
	
	
}	
); 
'; ?>

</script>


<table width="100%" border="0" id="allQuizes" cellspacing="1">
<thead> 
    <tr>
		<th>Nr</th>
		<th>Frage</th>	
		<th>Ebene</th>	
		<th>Edit/L&ouml;schen</th>
	</tr>
</thead> 
<tbody> 
    <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
        <tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#dedede,#eeeeee",'advance' => false), $this);?>
">
        	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['FRAGE_NR'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td> 
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['FRAGE'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td> 
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['EBENE'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td> 
            <td>
	            <a class="internal" href="path=editQuestion&quizId=<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['QUIZ_ID'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
&frageNr=<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['FRAGE_NR'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" ><img src="images/edit.png" width="16" height="16" title="Editieren" /></a>
	            &nbsp;&nbsp;&nbsp;
	            <a href="javascript:void(0);" onClick="javascript:removeQuestion(<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['QUIZ_ID'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
,<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['FRAGE_NR'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
);"><img src="images/delete.png" width="16" height="16" title="Entfernen" /></a>
	        </td>
        </tr>
    <?php endforeach; else: ?>
        <tr>
            <td style="text-align:center;" colspan="6">Es sind noch keine Fragen angelegt!</td>
        </tr>
    <?php endif; unset($_from); ?>
</tbody>
</table>
<div id="new"><a class="internal" href="javascript:void(0);" onClick="javascript:newQuestion_local();" ><img src="images/edit.png" width="16" height="16" title="Neues Quiz" />Neue Frage anlegen</a></div>