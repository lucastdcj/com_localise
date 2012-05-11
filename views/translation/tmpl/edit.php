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
JHtml::_('stylesheet','com_localise/localise.css', null, true);
$parts = explode('-', $this->state->get('translation.reference'));
$src = $parts[0];
$parts = explode('-', $this->state->get('translation.tag'));
$dest = $parts[0];
$document = JFactory::getDocument();
$document->addScript('http://www.google.com/jsapi');
$document->addScriptDeclaration("
if (typeof(Localise) === 'undefined') {
	Localise = {};
}
Localise.language_src = '".$src."';
Localise.language_dest = '".$dest."';
");
$fieldSets = $this->form->getFieldsets();
$sections = $this->form->getFieldsets('strings');
$ftpSets = $this->formftp->getFieldsets();
?>
<script type="text/javascript">
	if (typeof(google) !== 'undefined')
	{
		google.load('language', '1');
		google.setOnLoadCallback(null);
	}
	Joomla.submitbutton = function(task) {
		if (task == 'translation.cancel' || document.formvalidator.isValid(document.id('localise-translation-form'))) {
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
			<li>
				<?php echo $field->label; ?>
				<?php echo $field->input; ?>
			</li>
		<?php endforeach; ?>
		</ul>
	</fieldset>
	<?php endif; ?>

	<fieldset class="panelform">
	<?php echo JHtml::_('tabs.start', 'com_localise_legend_tabs', array('useCookie'=>true));?>
    
<!--mhehm>-->  
	<?php echo JHtml::_('tabs.panel', JText::_($fieldSets['default']->label), 'default');?>
		<?php if (!empty($fieldSets['default']->description)):?>
			<p class="tip"><?php echo JText::_($fieldSets['default']->description); ?></p>
		<?php endif;?>
		<ul class="adminformlist">
		<?php foreach($this->form->getFieldset('default') as $field): ?>
			<li>
				<?php echo $field->label; ?>
				<?php echo $field->input; ?>
			</li>
		<?php endforeach; ?>
		</ul>
	<div class="clr"></div>
 <!--<mhehm-->  
    
	<?php echo JHtml::_('tabs.panel', JText::_('COM_LOCALISE_FIELDSET_TRANSLATION_STRINGS'), 'strings');?>
	<div class="key">
		<?php echo JHtml::_('sliders.start', 'com_localise_legend_translation', array('allowAllClose'=>true, 'startOffset'=>-1, 'useCookie'=>true));?>
		<?php echo JHtml::_('sliders.panel', JText::_($fieldSets['legend']->label), 'legend');?>
			<?php if (!empty($fieldSets['legend']->description)):?>
				<p class="tip"><?php echo JText::_($fieldSets['legend']->description); ?></p>
			<?php endif;?>
			<ul class="adminformlist">
			<?php foreach($this->form->getFieldset('legend') as $field): ?>
				<li>
					<?php echo $field->label; ?>
					<?php echo $field->input; ?>
				</li>
			<?php endforeach; ?>
			</ul>
		<?php echo JHtml::_('sliders.end');?>
		<?php if(count($sections)>1):?>
			<?php echo JHtml::_('sliders.start','localise-translation-sliders', array('useCookie'=>1)); ?>
			<?php foreach ($sections as $name => $fieldSet) :?>
				<?php echo JHtml::_('sliders.panel',$fieldSet->label, $name.'-options');?>
				<ul class="adminformlist">
				<?php foreach ($this->form->getFieldset($name) as $field) :?>
					<li>
						<?php echo $field->label; ?>
						<?php echo $field->input; ?>
					</li>
				<?php endforeach;?>
				</ul>
			<?php endforeach;?>
			<?php echo JHtml::_('sliders.end'); ?>
		<?php else:?>
			<ul class="adminformlist">
			<?php $sections = array_keys($sections);?>
			<?php foreach ($this->form->getFieldset($sections[0]) as $field) :?>
				<li>
					<?php echo $field->label; ?>
					<?php echo $field->input; ?>
				</li>
			<?php endforeach;?>
			</ul>
		<?php endif;?>
	</div>
	<div class="clr"></div>
	<?php echo JHtml::_('tabs.panel', JText::_($fieldSets['permissions']->label), 'permissions');?>
		<?php if (!empty($fieldSets['permissions']->description)):?>
			<p class="tip"><?php echo JText::_($fieldSets['permissions']->description); ?></p>
		<?php endif;?>
		<ul class="adminformlist">
		<?php foreach($this->form->getFieldset('permissions') as $field): ?>
			<li>
				<?php echo $field->label; ?>
				<?php echo $field->input; ?>
			</li>
		<?php endforeach; ?>
		</ul>
	<div class="clr"></div>
	<?php echo JHtml::_('tabs.end');?>
	</fieldset>
	<div>
		<input type="hidden" name="task" value="" />
		<?php echo JHtml::_('form.token'); ?>
	</div>
</form>

