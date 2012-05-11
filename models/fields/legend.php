<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: localise.php 151 2009-12-30 12:56:12Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
jimport('joomla.form.formfield');

/**
 * Form Field Legend class.
 *
 * @package		Extensions.Components
 * @subpackage	Localise
 */
class JFormFieldLegend extends JFormField
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Legend';

	/**
	 * Method to get the field input.
	 *
	 * @return	string		The field input.
	 */
	protected function getInput() 
	{
		$return = '<table style="float:left;">';
		$return.= '<tr><td><input class="translated" size="30" type="text" value="' . JText::_('COM_LOCALISE_TEXT_TRANSLATION_TRANSLATED') . '" readonly="readonly"/></td></tr>';
		$return.= '<tr><td><input class="unchanged" size="30"  type="text" value="' . JText::_('COM_LOCALISE_TEXT_TRANSLATION_UNCHANGED') . '" readonly="readonly"/></td></tr>';
		$return.= '<tr><td><input class="untranslated" size="30"  type="text" value="' . JText::_('COM_LOCALISE_TEXT_TRANSLATION_UNTRANSLATED') . '" readonly="readonly"/></td></tr>';
		$return.= '<tr><td><input class="extra" size="30" type="text" value="' . JText::_('COM_LOCALISE_TEXT_TRANSLATION_NOTINREFERENCE') . '" readonly="readonly"/></td></tr>';
		$return.= '</table>';
		return $return;
	}
}
