<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: localise.php 161 2010-01-11 10:42:37Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @package		Extensions.Components
 * @subpackage	Localise
 */
?>
<tr>
	<th width="20">#</th>
	<th width="100"><?php echo JText::_('COM_LOCALISE_HEADING_TRANSLATIONS_INFORMATION'); ?></th>
	<th width="50"><?php echo JHTML::_('grid.sort', 'COM_LOCALISE_HEADING_TRANSLATIONS_TAG', 'tag', $this->state->get('list.direction'), $this->state->get('list.ordering')); ?></th>
	<th width="250"><?php echo JHTML::_('grid.sort', 'COM_LOCALISE_HEADING_TRANSLATIONS_NAME', 'filename', $this->state->get('list.direction'), $this->state->get('list.ordering')); ?></th>
	<th><?php echo JHTML::_('grid.sort', 'COM_LOCALISE_HEADING_TRANSLATIONS_PATH', 'path', $this->state->get('list.direction'), $this->state->get('list.ordering')); ?></th>
	<th width="120"><?php echo JHTML::_('grid.sort', 'COM_LOCALISE_HEADING_TRANSLATIONS_TRANSLATED', 'completed', $this->state->get('list.direction'), $this->state->get('list.ordering')); ?></th>
	<th width="120"><?php echo JHTML::_('grid.sort', 'COM_LOCALISE_HEADING_TRANSLATIONS_PHRASES', 'translated', $this->state->get('list.direction'), $this->state->get('list.ordering')); ?></th>
	<th width="100"><?php echo JText::_('COM_LOCALISE_HEADING_TRANSLATIONS_AUTHOR'); ?></th>
</tr>
