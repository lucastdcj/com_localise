<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: controller.php 251 2011-04-13 17:57:05Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// import controller parent class
jimport('joomla.application.component.controller');

/**
 * Controller class for the localise component
 *
 * @package		Extensions.Components
 * @subpackage	Localise
 */
class LocaliseController extends JController
{
	public function display($cachable = false, $urlparams = false) 
	{
		$vName = JRequest::getCmd('view', 'languages');
		if ($vName == 'translations') 
		{
			$view = $this->getView('translations', 'html');
			$packages = $this->getModel('Packages', 'LocaliseModel', array('ignore_request' => true));
			$view->setModel($packages);
		}
		else
		{
			JRequest::setVar('view', $vName);
		}
		parent::display($cachable, $urlparams);

		// Load the submenu.
		LocaliseHelper::addSubmenu($vName);
	}
}
