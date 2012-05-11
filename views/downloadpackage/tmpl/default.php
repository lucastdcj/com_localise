<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: localise.php 161 2010-01-11 10:42:37Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @package		Extensions.Components
 * @subpackage	Localise
 */
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
?>
<script type="text/javascript">
<!--
	function submitbutton(task)
	{
		if (task == 'package.cancel' || document.formvalidator.isValid(document.id('localise-downloadpackage-form'))) {
			submitform(task);
		}
		else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
// -->
</script>
<form action="<?php echo JRoute::_('index.php?option=com_localise&view=exportpackage&format=raw');?>" method="post" name="adminForm" id="localise-downloadpackage-form" class="form-validate">
	<?php if ($this->item->standalone):?>
	<fieldset class="adminform">
		<legend><?php echo JText::_('COM_LOCALISE_GROUP_DOWNLOADPACKAGE');?></legend>
		<?php foreach($this->form->getFields() as $field): ?>
			<?php if (!$field->hidden): ?>
				<?php echo $field->label; ?>
			<?php endif; ?>
			<?php echo $field->input; ?>
		<?php endforeach; ?>
		<div class="clr"></div>
		<button type="button" onclick="javascript: submitbutton('display');window.top.setTimeout('window.parent.SqueezeBox.close()', 2000);"><?php echo JText::_('JSubmit');?></button>
	<?php endif;?>
		<button type="button" onclick="javascript: window.parent.SqueezeBox.close();"><?php echo JText::_('JCancel');?></button>
	</fieldset>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>

