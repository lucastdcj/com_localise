<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: localise.php 151 2009-12-30 12:56:12Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */

// import Joomla table library
jimport('joomla.database.table');

/**
 * Localise Table class for the Localise Component
 *
 * @package		Extensions.Components
 * @subpackage	Localise
 */
class LocaliseTableLanguage extends JTable
{

	/**
	 * Constructor
	 *
	 * @param object Database connector object
	 */
	function LocaliseLanguageTableLocalise(&$db) 
	{
		parent::__construct('#__localise_language', 'id', $db);
	}

	/**
	 * Method to compute the default name of the asset.
	 * The default name is in the form `table_name.id`
	 * where id is the value of the primary key of the table.
	 *
	 * @return	string
	 */
	protected function _getAssetName() 
	{
		$k = $this->_tbl_key;
		return 'com_localise_language.' . (int)$this->$k;
	}

	/**
	 * Method to return the title to use for the asset table.
	 *
	 * @return	string
	 * @since	1.6
	 */
	protected function _getAssetTitle() 
	{
		return $this->path;
	}

	/**
	 * Get the parent asset id for the record
	 *
	 * @return	int
	 */
	protected function _getAssetParentId($table = null, $id = null) 
	{
		$asset = JTable::getInstance('asset');
		$asset->loadByName('com_localise');
		return $asset->id;
	}

	/**
	 * Method to load a row from the database by primary key and bind the fields
	 * to the JTable instance properties.
	 *
	 * @param	mixed	An optional primary key value to load the row by, or an array of fields to match.  If not
	 *					set the instance property value is used.
	 * @param	boolean	True to reset the default values before loading the new row.
	 * @return	boolean	True if successful. False if row not found or on error (internal error state set in that case).
	 * @since	1.0
	 * @link	http://docs.joomla.org/JTable/load
	 */
	public function load($keys = null, $reset = true) 
	{
		if (!is_array($keys)) 
		{
			// Load by primary key.
			static $instances;
			if (!isset($instances)) 
			{
				$db = $this->getDBO();
				$query = $db->getQuery(true);
				$query->select('*');
				$query->from('#__localise_language');
				$db->setQuery($query);
				$instances = $db->loadAssocList('id');
			}
			if (empty($keys)) 
			{
				// If empty, use the value of the current key
				$keyName = $this->getKeyName();
				$keys = array($keyName => $this->$keyName);
			}
			if (array_key_exists($keys, $instances)) 
			{
				return $this->bind($instances[$keys]);
			}
		}
		return parent::load($keys, $reset);
	}
}
