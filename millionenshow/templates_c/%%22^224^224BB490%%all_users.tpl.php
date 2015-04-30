<?php /* Smarty version 2.6.26, created on 2015-04-14 08:37:03
         compiled from all_users.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'all_users.tpl', 74, false),array('modifier', 'escape', 'all_users.tpl', 75, false),)), $this); ?>
<script type="text/javascript">

<?php echo '

function removeUser(userId){
		var removeUserPage = "contents.php?action=deleteuser&userId=" + userId;
		$.get(removeUserPage, {\'action\':\'deleteuser\', \'userId\': userId}, function(data){
			 if (data == "OK") {
	  			$("#dialogok_deleteuser").dialog("open");
	  			if (loadAllUsers) {
	  				loadAllUsers();
	  			}
	  		} else {
	  			$("#dialogfailed_deleteuser").dialog("open");
	  		}
		});
}

$(document).ready(function() 
{		
	$("#dialogok_deleteuser").dialog({
				bgiframe: true,
				autoOpen: false,
				modal: true,
				resizable: false,
				buttons: {
					Ok: function() {
								$(this).dialog(\'close\');
							}
						}
			});
			
	$("#dialogfailed_deleteuser").dialog({
			bgiframe: true,
			autoOpen: false,
			modal: true,
			resizable: false,
			buttons: {
				Ok: function() {
							$(this).dialog(\'close\');
					}
			}
		});		
}
); 
'; ?>

</script>

<div style="display: none;" id="dialogok_deleteuser" title="Erfolgreiche Aktivit&auml;t">
	<p>
		<span class="ui-icon ui-icon-circle-check" style="float:left; margin:0 7px 50px 0;"></span>
		Der User wurde erfolgreich gel&ouml;scht.
	</p>
</div>

<div style="display: none;" id="dialogfailed_deleteuser" title="Fehlgeschlagene Aktivit&auml;t">
	<p>
		<span class="ui-icon ui-icon-circle-close" style="float:left; margin:0 7px 50px 0;"></span>
		Der User konnte nicht erfolgreich gel&ouml;scht werden!
	</p>
</div>

<table width="100%" border="0" id="allUsers" cellspacing="1">
<thead> 
    <tr>

		<th>Username</th>

		<th>Edit/L&ouml;schen</th>
	</tr>
</thead> 
<tbody> 
    <?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
        <tr bgcolor="<?php echo smarty_function_cycle(array('values' => "#dedede,#eeeeee",'advance' => false), $this);?>
">
        	<td><?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['USERNAME'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
</td>          
            <td>
	            <a class="internal" href="?path=editUser&userId=<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['USR_ID'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" ><img src="images/edit.png" width="16" height="16" title="Editieren" /></a>
	            &nbsp;&nbsp;&nbsp;
	            <?php if ($this->_tpl_vars['entry']['USR_ISADMIN'] == 0): ?>
	            	<a href="javascript:void(0);" onClick="javascript:removeUser(<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['USR_ID'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
);"><img src="images/delete.png" width="16" height="16" title="Entfernen" /></a>
	        	<?php endif; ?>
	        </td>
        </tr>
    <?php endforeach; else: ?>
        <tr>
            <td style="text-align:center;" colspan="6">Keine User sind zur Zeit angelegt!</td>
        </tr>
    <?php endif; unset($_from); ?>
</tbody>
</table>