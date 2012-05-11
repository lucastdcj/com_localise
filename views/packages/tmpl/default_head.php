<?php defined('_JEXEC') or die('Restricted access');
/**
 * @version		$Id: default_head.php 228 2010-07-08 09:42:09Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @package		Extensions.Components
 * @subpackage	Localise
 */
?>
<tr>
	<th width="20">#</th>
	<th width="20" align="center"><input type="checkbox" name="toggle" value="" onclick="checkAll(this);" /></th>
	<th><?php echo JHTML::_('grid.sort', 'COM_LOCALISE_HEADING_PACKAGES_TITLE', 'title', $this->state->get('list.direction'), $this->state->get('list.ordering')); ?></th>
</tr>

