<?php /* Smarty version 2.6.26, created on 2015-04-29 14:23:43
         compiled from viewadminquizes.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'viewadminquizes.tpl', 38, false),array('modifier', 'escape', 'viewadminquizes.tpl', 39, false),)), $this); ?>
<script type="text/javascript">
<?php echo '
function removeQuiz(quizId){
		$.post("contents.php",{\'action\':\'deletequiz\',\'quizId\': quizId},function(data){	
			if (data == "OK") {
				showdialog("Quiz wurde erfolgreich gelöscht.","viewAdminQuizes()","green");
			}
			else{

				showdialog(data,"viewAdminQuizes()","red");
			}

			
		});
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
		<th>ID</th>
		<th>Bezeichnung</th>
		<th>Beschreibung</th>		
		<th>Edit/L&ouml;schen</th>
	</tr>
</thead> 
<tbody> 
    <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
        <tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#dedede,#eeeeee",'advance' => false), $this);?>
">
        	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['QUIZ_ID'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td> 
        	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['BEZEICHNUNG'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td> 
			<td><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['BESCHREIBUNG'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td> 
			
            <td>
	            <a class="internal" href="path=editQuiz&quizId=<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['QUIZ_ID'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" ><img src="images/edit.png" width="16" height="16" title="Editieren" /></a>
	            &nbsp;&nbsp;&nbsp;
	            <a href="javascript:void(0);" onClick="javascript:removeQuiz(<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['QUIZ_ID'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
);"><img src="images/delete.png" width="16" height="16" title="Entfernen" /></a>
	        </td>
        </tr>
    <?php endforeach; else: ?>
        <tr>
            <td style="text-align:center;" colspan="6">Keine Quiz sind zur Zeit angelegt!</td>
        </tr>
    <?php endif; unset($_from); ?>
</tbody>
</table>
<br/>
<div id="new"><a class="internal" href="path=newQuiz" ><img src="images/edit.png" width="16" height="16" title="Neues Quiz" />Neues Quiz anlegen</a></div>