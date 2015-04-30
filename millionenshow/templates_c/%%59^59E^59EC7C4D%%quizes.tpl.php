<?php /* Smarty version 2.6.26, created on 2015-04-28 23:04:53
         compiled from quizes.tpl */ ?>
<?php require_once(SMARTY_CORE_DIR . 'core.load_plugins.php');
smarty_core_load_plugins(array('plugins' => array(array('modifier', 'escape', 'quizes.tpl', 12, false),)), $this); ?>
<script type="text/javascript"> 
<?php echo '
	
	
	
'; ?>

</script>

<div id="quiz_all">
<h1>W&auml;hlen Sie das gew&uuml;nschte Quiz aus</h1>
	<?php $_from = $this->_tpl_vars['data']; if (!is_array($_from) && !is_object($_from)) { settype($_from, 'array'); }if (count($_from)):
    foreach ($_from as $this->_tpl_vars['entry']):
?>
		<a class="internal" href="path=startQuiz&id=<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['QUIZ_ID'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
">
			<div class="quiz" id="quiz_<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['QUIZ_ID'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
" style="" >Quiz <?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['QUIZ_ID'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>
: <?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['BEZEICHNUNG'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

				<br/><br/>
				<?php echo ((is_array($_tmp=$this->_tpl_vars['entry']['BESCHREIBUNG'])) ? $this->_run_mod_handler('escape', true, $_tmp) : smarty_modifier_escape($_tmp)); ?>

		
			</div>
		</a>
	<?php endforeach; endif; unset($_from); ?>
</div>