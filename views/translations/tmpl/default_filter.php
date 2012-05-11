<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: localise.php 161 2010-01-11 10:42:37Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @package		Extensions.Components
 * @subpackage	Localise
 */
?>
<fieldset id="filter-bar" style="height: auto;">
	<div class="filter-search fltlft">
		<?php foreach($this->form->getFieldset('search') as $field): ?>
			<?php echo $field->label; ?>
			<?php echo $field->input; ?>
		<?php endforeach; ?>
	</div><br />
	<div class="filter-select fltrt">
		<?php foreach($this->form->getFieldset('select') as $field): ?>
			<?php echo $field->label; ?>
			<?php echo $field->input; ?>
		<?php endforeach; ?>
	</div>
</fieldset>
<div class="clr"></div>