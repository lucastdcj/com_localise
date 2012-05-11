<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: default_head.php 249 2011-02-12 00:21:50Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @package		Extensions.Components
 * @subpackage	Localise
 */
?>
<tr>
	<th width="20" align="center"></th>
	<th><?php echo JHTML::_('grid.sort', 'COM_LOCALISE_HEADING_LANGUAGES_NAME', 'tag', $this->state->get('list.direction'), $this->state->get('list.ordering')); ?></th>
	<th><?php echo JHTML::_('grid.sort', 'COM_LOCALISE_HEADING_LANGUAGES_CLIENT', 'client', $this->state->get('list.direction'), $this->state->get('list.ordering')); ?></th>
	<th><?php echo JText::_('COM_LOCALISE_HEADING_LANGUAGES_DEFAULT'); ?></th>
	<th><?php echo JText::_('COM_LOCALISE_HEADING_LANGUAGES_FILES'); ?></th>
	<th><?php echo JText::_('COM_LOCALISE_HEADING_LANGUAGES_VERSION'); ?></th>
	<th><?php echo JText::_('COM_LOCALISE_HEADING_LANGUAGES_DATE'); ?></th>
	<th><?php echo JText::_('COM_LOCALISE_HEADING_LANGUAGES_AUTHOR'); ?></th>
</tr>
