<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: localise.php 151 2009-12-30 12:56:12Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
jimport('joomla.form.formfield');

/**
 * Form Field Place class.
 *
 * @package		Extensions.Components
 * @subpackage	Localise
 */
class JFormFieldStorage extends JFormField
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Storage';

	/**
	 * Method to get the field input.
	 *
	 * @return	string		The field input.
	 */
	protected function getInput() 
	{
		$attributes = '';
		if ($v = (string)$this->element['onchange']) 
		{
			$attributes.= ' onchange="' . $v . '"';
		}
		$attributes.= ' class="localise-icon icon-16-' . $this->value . '"';
		$options = array();
		foreach ($this->element->children() as $option) 
		{
			$options[] = JHtml::_('select.option', $option->attributes('value'), JText::_(trim($option->data())), array('option.attr' => 'attributes', 'attr' => 'class="localise-icon"'));
		}
		$options[] = JHtml::_('select.option', 'global', JText::sprintf('COM_LOCALISE_OPTION_TRANSLATIONS_STORAGE_GLOBAL'), array('option.attr' => 'attributes', 'attr' => 'class="localise-icon icon-16-global"'));
		$options[] = JHtml::_('select.option', 'local', JText::sprintf('COM_LOCALISE_OPTION_TRANSLATIONS_STORAGE_LOCAL'), array('option.attr' => 'attributes', 'attr' => 'class="localise-icon icon-16-local"'));
		$return = JHtml::_('select.genericlist', $options, $this->name, array('id' => $this->id, 'list.select' => $this->value, 'option.attr' => 'attributes', 'list.attr' => $attributes));
		return $return;
	}
}
