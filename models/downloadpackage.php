<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: language.php 189 2010-02-21 05:11:04Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
jimport('joomla.application.component.modelform');
jimport('joomla.utilities.utility');

/**
 * Download package Model class for the Localise component
 *
 * @package		Extensions.Components
 * @subpackage	Localise
 */
class LocaliseModelDownloadPackage extends JModelForm
{
	protected $_context = 'com_localise.package';

	/**
	 * Method to auto-populate the model state.
	 */
	protected function _populateState() 
	{
		// Get the data
		$name = JRequest::getVar('name');
		$standalone = JRequest::getVar('standalone');
		$author = JRequest::getString(JUtility::getHash($this->_context . '.author'), '', 'cookie');
		$copyright = JRequest::getString(JUtility::getHash($this->_context . '.copyright'), '', 'cookie');
		$email = JRequest::getString(JUtility::getHash($this->_context . '.email'), '', 'cookie');
		$url = JRequest::getString(JUtility::getHash($this->_context . '.url'), '', 'cookie');
		$version = JRequest::getString(JUtility::getHash($this->_context . '.version'), '', 'cookie');
		$license = JRequest::getString(JUtility::getHash($this->_context . '.license'), '', 'cookie');

		// Set the state
		$this->setState('downloadpackage.name', $name);
		$this->setState('downloadpackage.standalone', $standalone);
		$this->setState('downloadpackage.author', $author);
		$this->setState('downloadpackage.copyright', $copyright);
		$this->setState('downloadpackage.email', $email);
		$this->setState('downloadpackage.url', $url);
		$this->setState('downloadpackage.version', $version);
		$this->setState('downloadpackage.license', $license);
	}

	/**
	 * Method to get the record form.
	 *
	 * @return	mixed	JForm object on success, false on failure.
	 * @since	1.6
	 */
	public function getForm() 
	{
		// Get the form.
		$form = parent::getForm('downloadpackage', 'com_localise.downloadpackage', array('array' => 'jform'));

		// Check for an error.
		if (JError::isError($form)) 
		{
			$this->setError($form->getMessage());
			return false;
		}
		$form->setValue('name', $this->getState('downloadpackage.name'));
		$form->setValue('author', $this->getState('downloadpackage.author'));
		$form->setValue('copyright', $this->getState('downloadpackage.copyright'));
		$form->setValue('email', $this->getState('downloadpackage.email'));
		$form->setValue('url', $this->getState('downloadpackage.url'));
		$form->setValue('version', $this->getState('downloadpackage.version'));
		$form->setValue('license', $this->getState('downloadpackage.license'));
		return $form;
	}

	/**
	 * Method to get the Item.
	 *
	 * @return	mixed	JForm object on success, false on failure.
	 * @since	1.6
	 */
	public function getItem() 
	{
		$item = new JObject();
		$item->standalone = $this->getState('downloadpackage.standalone');
		return $item;
	}
}
