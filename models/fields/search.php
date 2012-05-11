<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: localise.php 151 2009-12-30 12:56:12Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
jimport('joomla.form.formfield');

/**
 * Form Field Search class.
 *
 * @package		Extensions.Components
 * @subpackage	Localise
 */
class JFormFieldSearch extends JFormField
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Search';

	/**
	 * Method to get the field input.
	 *
	 * @return	string		The field input.
	 */
	protected function getInput() 
	{
		$html = '';
		$html.= '<input type="text" name="' . $this->name . '" id="' . $this->id . '" value="' . $this->value . '" title="' . JText::_('JSearch_Filter') . '" onchange="this.form.submit();" />';

		$html.= '<button type="submit" class="btn">' . JText::_('JSearch_Filter_Submit') . '</button>';
		$html.= '<button type="button" class="btn" onclick="document.id(\'' . $this->id . '\').value=\'\';this.form.submit();">' . JText::_('JSearch_Filter_Clear') . '</button>';

		return $html;
	}
}
