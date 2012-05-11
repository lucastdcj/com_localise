<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: localise.php 251 2011-04-13 17:57:05Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @package		Extensions.Components
 * @subpackage	Localise
 */

// Access check.
if (!JFactory::getUser()->authorise('core.manage', 'com_localise')) 
{
	return JError::raiseWarning(404, JText::_('ALERTNOTAUTH'));
}

// Include helper files
require_once JPATH_COMPONENT . '/helpers/defines.php';
require_once JPATH_COMPONENT . '/helpers/localise.php';

// Include dependancies
jimport('joomla.application.component.controller');

//Get the controller
$controller = JController::getInstance('Localise');

// Execute the task.
$controller->execute(JRequest::getCmd('task', 'display'));
$controller->redirect();
