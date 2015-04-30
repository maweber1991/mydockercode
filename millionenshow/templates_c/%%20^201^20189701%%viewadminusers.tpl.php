<?php /* Smarty version 2.6.26, created on 2015-04-29 14:14:50
         compiled from viewadminusers.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'viewadminusers.tpl', 36, false),array('modifier', 'escape', 'viewadminusers.tpl', 37, false),)), $this); ?>
<script type="text/javascript">
<?php echo '
function removeUser(userId){
		$.post("contents.php",{\'action\':\'deleteuser\',\'userId\': userId},function(data){	
			if (data == "OK") {
				showdialog("User wurde erfolgreich gelöscht.","viewAdminUsers()");
			}
			else{
				showdialog(data,"viewAdminUsers()");
			}
			
			
		});
}

$(document).ready(function() 
{		

}	
); 
'; ?>

</script>


<table width="100%" border="0" id="allUsers" cellspacing="1">
<thead> 
    <tr>
		<th>ID</th>
		<th>Username</th>
		<th>Administrator</th>		
		<th>Edit/L&ouml;schen</th>
	</tr>
</thead> 
<tbody> 
    <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
        <tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#dedede,#eeeeee",'advance' => false), $this);?>
">
        	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['USER_ID'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td> 
        	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['USERNAME'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td> 
			<td><input onclick="return false;"  onkeydown="return false;" type="checkbox" <?php if ($this->_tpl_vars['entry']['IS_ADMIN'] == 1): ?>checked<?php endif; ?>></td>	
            <td>
	            <a class="internal" href="path=editUser&userId=<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['USER_ID'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" ><img src="images/edit.png" width="16" height="16" title="Editieren" /></a>
	            &nbsp;&nbsp;&nbsp;
	            <a href="javascript:void(0);" onClick="javascript:removeUser(<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['USER_ID'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
);"><img src="images/delete.png" width="16" height="16" title="Entfernen" /></a>
	        </td>
        </tr>
    <?php endforeach; else: ?>
        <tr>
            <td style="text-align:center;" colspan="6">Keine User sind zur Zeit angelegt!</td>
        </tr>
    <?php endif; unset($_from); ?>
</tbody>
</table>
<br/>
<div id="new"><a class="internal" href="path=newUser" ><img src="images/edit.png" width="16" height="16" title="Neuer User" />Neuen User anlegen</a></div>