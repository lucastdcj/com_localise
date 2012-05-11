<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: localise.php 161 2010-01-11 10:42:37Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @package		Extensions.Components
 * @subpackage	Localise
 */

JHtml::addIncludePath(JPATH_COMPONENT.'/helpers/html');
JHtml::_('behavior.tooltip');
JHtml::_('behavior.formvalidation');
JHtml::_('behavior.keepalive');
JHTML::_('stylesheet','com_localise/localise.css', null, true);
$fieldSets = $this->form->getFieldsets();
$ftpSets = $this->formftp->getFieldsets();
?>
<script type="text/javascript">
	Joomla.submitbutton = function(task)
	{
		if (task == 'translation.cancel' || document.formvalidator.isValid(document.id('localise-translation-form'))) {
			<?php echo $this->form->getField('source')->save(); ?>
			Joomla.submitform(task, document.getElementById('localise-translation-form'));
		} else {
			alert('<?php echo $this->escape(JText::_('JGLOBAL_VALIDATION_FORM_FAILED'));?>');
		}
	}
</script>

<form action="<?php JRoute::_('index.php?option=com_localise'); ?>" method="post" name="adminForm" id="localise-translation-form" class="form-validate">
	<?php if ($this->ftp) : ?>
	<fieldset class="panelform">
		<legend><?php echo JText::_($ftpSets['ftp']->label); ?></legend>
		<?php if (!empty($ftpSets['ftp']->description)):?>
		<p class="tip"><?php echo JText::_($ftpSets['ftp']->description); ?></p>
		<?php endif;?>
		<?php if (JError::isError($this->ftp)): ?>
		<p class="error"><?php echo JText::_($this->ftp->message); ?></p>
		<?php endif; ?>
		<ul class="adminformlist">
		<?php foreach($this->formftp->getFieldset('ftp',false) as $field): ?>
			<?php if ($field->hidden): ?>
				<?php echo $field->input; ?>
			<?php else:?>
			<li>
				<?php echo $field->label; ?>
				<?php echo $field->input; ?>
			</li>
			<?php endif; ?>
		<?php endforeach; ?>
		</ul>
	</fieldset>
	<?php endif; ?>
	<fieldset class="panelform">
		<legend><?php echo JText::_($fieldSets['source']->label); ?></legend>
		<?php if (isset($fieldSets['source']->description)):?>
			<p class="tip"><?php echo JText::_($fieldSets['source']->description); ?></p>
		<?php endif;?>
		<div class="clr"></div>
		<div class="editor-border">
		<?php echo $this->form->getInput('source'); ?>
		</div>
	</fieldset>
	<input type="hidden" name="task" value="" />
	<?php echo JHtml::_('form.token'); ?>
</form>
