<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: localise.php 151 2009-12-30 12:56:12Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 */
jimport('joomla.html.html');
jimport('joomla.filesystem.folder');
JFormHelper::loadFieldClass('groupedlist');

/**
 * Form Field Translations class.
 *
 * @package		Extensions.Components
 * @subpackage	Localise
 */
class JFormFieldTranslations extends JFormFieldGroupedList
{
	/**
	 * The field type.
	 *
	 * @var		string
	 */
	protected $type = 'Translations';

	/**
	 * Method to get a list of options for a list input.
	 *
	 * @return	array		An array of JHtml options.
	 */
	protected function getGroups() 
	{
		$package = (string)$this->element['package'];
		$groups = array('Site' => array(), 'Administrator' => array(), 'Installation' => array());
		foreach (array('Site', 'Administrator', 'Installation') as $client) 
		{
			$path = constant('LOCALISEPATH_' . strtoupper($client)) . '/language';
			$tags = JFolder::folders($path, '.', false, false, array('overrides', '.svn', 'CVS', '.DS_Store', '__MACOSX'));
			foreach ($tags as $tag) 
			{
				$files = JFolder::files("$path/$tag", ".ini$");
				foreach ($files as $file) 
				{
					$basename = substr($file, strlen($tag) + 1);
					if ($basename == 'ini') 
					{
						$key = 'joomla';
						$value = JText::_('COM_LOCALISE_TEXT_TRANSLATIONS_JOOMLA');
						$origin = LocaliseHelper::getOrigin('', strtolower($client));
						$disabled = $origin != $package && $origin != '_thirdparty';
					}
					else
					{
						$key = substr($basename, 0, strlen($basename) - 4);
						$value = $key;
						$origin = LocaliseHelper::getOrigin($key, strtolower($client));
						$disabled = $origin != $package && $origin != '_thirdparty';
					}
					$groups[$client][$key] = JHtml::_('select.option', strtolower($client) . '_' . $key, $value, 'value', 'text', $disabled);
				}
			}
		}
		$scans = LocaliseHelper::getScans();
		foreach ($scans as $scan) 
		{
			$prefix = $scan['prefix'];
			$suffix = $scan['suffix'];
			$type = $scan['type'];
			$client = ucfirst($scan['client']);
			$path = $scan['path'];
			$folder = $scan['folder'];
			$extensions = JFolder::folders($path);
			foreach ($extensions as $extension) 
			{
				if (JFolder::exists("$path$extension$folder/language")) 
				{
					// scan extensions folder
					$tags = JFolder::folders("$path$extension$folder/language");
					foreach ($tags as $tag) 
					{
						$file = "$path$extension$folder/language/$tag/$tag.$prefix$extension$suffix.ini";
						if (JFile::exists($file)) 
						{
							$origin = LocaliseHelper::getOrigin("$prefix$extension$suffix", strtolower($client));
							$disabled = $origin != $package && $origin != '_thirdparty';
							$groups[$client]["$prefix$extension$suffix"] = JHtml::_('select.option', strtolower($client) . '_' . "$prefix$extension$suffix", "$prefix$extension$suffix", 'value', 'text', $disabled);
						}
					}
				}
			}
		}
		foreach ($groups as $client => $extensions) 
		{
			JArrayHelper::sortObjects($groups[$client], 'text');
		}

		// Merge any additional options in the XML definition.
		$groups = array_merge(parent::getGroups(), $groups);
		return $groups;
	}
}
