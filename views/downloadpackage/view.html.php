<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: view.html.php 187 2010-02-19 15:44:56Z chdemko $
 * @copyright	Copyright (C) 2009 - today Localise Team, Inc. All rights reserved.
 * @license		GNU General Public License, see LICENSE.php
 */
jimport('joomla.application.component.view');

/**
 * View class for download a package.
 *
 * @package		Extensions.Components
 * @subpackage	Localise
 */
class LocaliseViewDownloadPackage extends JView
{
	protected $form;

	/**
	 * Display the view
	 */
	public function display($tpl = null) 
	{
		$form = & $this->get('Form');
		$item = & $this->get('Item');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		$this->form = & $form;
		$this->item = & $item;
		parent::display($tpl);
	}
}
