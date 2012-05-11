<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: view.html.php 187 2010-02-19 15:44:56Z chdemko $
 * @copyright	Copyright (C) 2009 - today Localise Team, Inc. All rights reserved.
 * @license		GNU General Public License, see LICENSE.php
 */
jimport('joomla.application.component.view');

/**
 * Export Package View class for the Localise component
 *
 * @package		Extensions.Components
 * @subpackage	Localise
 */
class LocaliseViewExportPackage extends JView
{
	protected $item;

	/**
	 * Display the view
	 */
	public function display($tpl = null) 
	{
		$item = $this->get('Item');

		// Check for errors.
		if (count($errors = $this->get('Errors'))) 
		{
			JError::raiseError(500, implode("\n", $errors));
			return false;
		}
		$document = JFactory::getDocument();
		$document->setMimeEncoding('application/zip');
		JResponse::setHeader('Content-disposition', 'attachment; filename="' . $item->filename . '.zip"; creation-date="' . JFactory::getDate()->toRFC822() . '"', true);
		echo $item->contents;
	}
}
