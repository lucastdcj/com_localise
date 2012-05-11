<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: localise.php 161 2010-01-11 10:42:37Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @package		Extensions.Components
 * @subpackage	Localise
 */
JHtml::_('behavior.tooltip');
JHtml::_('stylesheet','com_localise/localise.css', null, true);
?>
<form action="<?php echo JRoute::_('index.php?option=com_localise&view=translations');?>" method="post" name="adminForm" id="localise-translations-form">
	<?php echo $this->loadTemplate('legend');?>
	<?php echo $this->loadTemplate('filter');?>
	<table class="adminlist">
		<thead><?php echo $this->loadTemplate('head');?></thead>
		<tfoot><?php echo $this->loadTemplate('foot');?></tfoot>
		<tbody><?php echo $this->loadTemplate('body');?></tbody>
	</table>
	<input type="hidden" name="boxchecked" value="0" />
	<input type="hidden" name="task" value="" />
	<input type="hidden" name="filter_order" value="<?php echo $this->state->get('list.ordering');?>" />
	<input type="hidden" name="filter_order_Dir" value="<?php echo $this->state->get('list.direction');?>" />
	<?php echo JHtml::_('form.token'); ?>
</form>

