<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: defines.php 251 2011-04-13 17:57:05Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @package		Extensions.Components
 * @subpackage	Localise
 */

// Define constant
$params = JComponentHelper::getParams('com_localise');
define('LOCALISEPATH_SITE', JPATH_SITE);
define('LOCALISEPATH_ADMINISTRATOR', JPATH_ADMINISTRATOR);
define('LOCALISEPATH_INSTALLATION', JPATH_ROOT . '/' . $params->get('installation', 'installation'));
