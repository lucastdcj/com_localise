<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: localise.php 151 2009-12-30 12:56:12Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
jimport('joomla.application.component.controllerform');

/**
 * Package Controller class for the Localise component
 *
 * @package		Extensions.Components
 * @subpackage	Localise
 */
class LocaliseControllerPackage extends JControllerForm
{
	protected $_view_items = 'packages';
	public function __construct($config = array()) 
	{
		parent::__construct($config);
		$cid = JRequest::getVar('cid', array(), 'default', 'array');

		// Initialise variables.
		$app = JFactory::getApplication();

		// Get the id
		$cid = JRequest::getVar('cid', array(), 'default', 'array');
		$id = count($cid) ? $cid[0] : JRequest::getCmd('id');
		if (!empty($id)) 
		{
			// From the packages view
			$path = JPATH_COMPONENT_ADMINISTRATOR . "/packages/$id.xml";
			$name = $id;
			$id = LocaliseHelper::getFileId($path);
		}
		else
		{
			// From the package view
			$data = JRequest::getVar('jform', array(), 'default', 'array');
			$id = $data['id'];
			$name = $data['name'];
		}

		// Set the id, and path in the session
		$app->setUserState('com_localise.edit.package.id', $id);
		$app->setUserState('com_localise.package.name', $name);

		// Set the id and unset the cid
		if (!empty($id) && JRequest::getVar('task') == 'add') 
		{
			JRequest::setVar('task', 'edit');
		}
		JRequest::setVar('id', $id);
		JRequest::setVar('cid', array());
	}

	/**
	 * Method to check if you can add a new record.
	 *
	 * Extended classes can override this if necessary.
	 *
	 * @param	array	An array of input data.
	 *
	 * @return	boolean
	 */
	protected function _allowAdd($data = array()) 
	{
		return JFactory::getUser()->authorise('localise.create', $this->_option);
	}

	/**
	 * Method to check if you can add a new record.
	 *
	 * Extended classes can override this if necessary.
	 *
	 * @param	array	An array of input data.
	 * @param	string	The name of the key for the primary key.
	 *
	 * @return	boolean
	 */
	protected function _allowEdit($data = array(), $key = 'id') 
	{
		return JFactory::getUser()->authorise('localise.edit', $this->_option . '.' . $data[$key]);
	}

	/**
	 * Method to get a model object, loading it if required.
	 *
	 * @param	string	The model name. Optional.
	 * @param	string	The class prefix. Optional.
	 * @param	array	Configuration array for model. Optional.
	 *
	 * @return	object	The model.
	 */
	public function getModel($name = 'Package', $prefix = 'LocaliseModel', $config = array('ignore_request' => false)) 
	{
		return parent::getModel($name, $prefix, $config);
	}
	public function download() 
	{
		// Redirect to the export view
		$app = JFactory::getApplication();
		$name = $app->getUserState('com_localise.package.name');
		$path = JPATH_ROOT . "/media/com_localise/packages/$name.xml";
		$id = LocaliseHelper::getFileId($path);

		// Check if the package exists
		if (empty($id)) 
		{
			$this->setRedirect(JRoute::_('index.php?option=' . $this->_option . '&view=packages', false), JText::sprintf('COM_LOCALISE_ERROR_DOWNLOADPACKAGE_UNEXISTING', $name), 'error');
		}
		else
		{
			$model = $this->getModel();
			$package = $model->getItem();
			if (!$package->standalone) 
			{
				$msg = JText::sprintf('COM_LOCALISE_NOTICE_DOWNLOADPACKAGE_NOTSTANDALONE', $name);
				$type = 'notice';
			}
			else
			{
				$msg = '';
				$type = 'message';
			}
			$this->setRedirect(JRoute::_('index.php?option=' . $this->_option . '&tmpl=component&view=downloadpackage&name=' . $name . '&standalone=' . $package->standalone, false), $msg, $type);
		}
	}

	/**
	 * Method to create the install file for package
	 */
	public function export() 
	{
		$app = JFactory::getApplication();

		//		$name = $app->getUserState('com_localise.package.name');
		$data = JRequest::getVar('jform');
		$name = $data['name'];
		$path = JPATH_ROOT . "/media/com_localise/packages/$name.xml";
		$id = LocaliseHelper::getFileId($path);

		// Check if the package exists
		if (empty($id)) 
		{
			$this->setRedirect(JRoute::_('index.php?option=' . $this->_option . '&view=packages', false), JText::sprintf('COM_LOCALISE_ERROR_EXPORT_UNEXISTING', $name), 'error');
			return false;
		}

		// Get the package model
		$model = JModel::getInstance('Package', 'LocaliseModel');
		$model->setState('package.id', $id);
		$model->setState('package.name', $packageName);
		$package = $model->getItem();

		// Check if the package is correct
		if (count($package->getErrors())) 
		{
			$this->setRedirect(JRoute::_('index.php?option=' . $this->_option . '&view=packages', false), implode('<br />', $package->getErrors()), 'error');
			return false;
		}

		// Check if the package is readonly
		if ($package->readonly) 
		{
			$this->setRedirect(JRoute::_('index.php?option=' . $this->_option . '&view=packages', false), JText::sprintf('COM_LOCALISE_NOTICE_EXPORT_READONLY', $name), 'notice');
			return false;
		}

		// Redirect to the export view
		$this->setRedirect(JRoute::_('index.php?option=' . $this->_option . '&view=exportpackage&format=raw&tmpl=component&name=' . $name, false));
		return;

		//		return true;
		//		JRequest::setVar('tmpl','component');

		// Initialise variables.

		//		$app		= JFactory::getApplication();

		//		$model		= $this->getModel();

		//		$table		= $model->getTable();

		//		$cid		= JRequest::getVar('cid', array(), 'post', 'array');

		//		$recordId	= (int) (count($cid) ? $cid[0] : JRequest::getInt('id'));

		//		$app->setUserState($context.'.id',	$recordId);

		//		$this->setRedirect('index.php?option='.$this->_option.'&view='.$this->_view_item.$append);

		//		return true;

		// Get the document object.

		$document = & JFactory::getDocument();

		//		$document->setType('raw');
		$vName = 'export';
		$vFormat = 'raw';

		// Get and render the view.
		if ($view = & $this->getView($vName, $vFormat)) 
		{
			// Get the model for the view.
			$model = & $this->getModel($vName);

			// Load the filter state.
			$app = & JFactory::getApplication();

			//			$model->setState('basename',$form['basename']);
			//			$model->setState('compressed',$form['compressed']);

			// Push the model into the view (as default).

			$view->setModel($model, true);

			// Push document object into the view.
			$view->assignRef('document', $document);
			$view->display();
		}
	}
}
