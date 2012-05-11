<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: localise.php 151 2009-12-30 12:56:12Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
jimport('joomla.application.component.controller');
jimport('joomla.filesystem.file');

/**
 * Translations Controller class for the Localise component
 *
 * @package		Extensions.Components
 * @subpackage	Localise
 */
class LocaliseControllerTranslations extends JController
{
	/*public function display()
	{
	$translations = & $this->getModel('translations');
	$view = & $this->getView('translations', 'html');
	if (!JFile::exists(LocaliseHelper::getPathMeta($translations->getClient(), $translations->getTag())))
	{
	$view->setLayout('error');
	$app = & JFactory::getApplication('administrator');
	$app->enqueueMessage(JText::sprintf('COM_LOCALISE_THE_LANGUAGE_ISO_TAG_DOES_NOT_EXIST_IN_THIS_CLIENT', $translations->getTag()), 'notice');
	}
	$view->setModel($translations, true);
	$view->display();
	}
	public function setRefTag()
	{
	$translations = & $this->getModel('translations');
	if ($translations->setRefTag())
	{
	$msg = JText::_('COM_LOCALISE_REFERENCE_LANGUAGE_CHANGED');
	$type = 'message';
	}
	else
	{
	$msg = JText::sprintf('COM_LOCALISE_ERROR_CHANGING_REFERENCE_LANGUAGE', $translations->getError());
	$type = 'error';
	}
	$url = "index.php?";
	$url.= "&option=com_localise";
	$url.= "&task=translations.display";
	$url.= "&client=" . $translations->getState('client');
	$url.= "&tag=" . $translations->getState('tag');
	$this->setRedirect($url, $msg, $type);
	}*/
}
