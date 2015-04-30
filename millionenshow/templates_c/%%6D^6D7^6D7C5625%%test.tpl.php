<?php /* Smarty version 2.6.26, created on 2015-04-14 08:44:24
         compiled from test.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('function', 'cycle', 'test.tpl', 11, false),array('modifier', 'escape', 'test.tpl', 12, false),)), $this); ?>
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

	        </td>
        </tr>
    <?php endforeach; else: ?>
        <tr>
            <td style="text-align:center;" colspan="6">Keine User sind zur Zeit angelegt!</td>
        </tr>
    <?php endif; unset($_from); ?>
</tbody>
</table>