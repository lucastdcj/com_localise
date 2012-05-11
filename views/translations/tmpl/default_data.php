<?php defined('_JEXEC') or die('Restricted access');

/**
 * @version		$Id: localise.php 161 2010-01-11 10:42:37Z chdemko $
 * @copyright   Copyright (C) 2009 - today Localise Team. All rights reserved.
 * @license     http://www.gnu.org/licenses/gpl-2.0.html GNU/GPL
 * @package		Extensions.Components
 * @subpackage	Localise
 */
?>
<?php if ($this->language->tag == $this->form->getValue('reftag')): ?>
	<div style="float:right;">
		<?php echo JText::sprintf('COM_LOCALISE_TOTAL_FILES', $this->total); ?><br/>
	</div>
	<div style="float:right;">
		<?php echo JText::sprintf('COM_LOCALISE_TOTAL_PHRASES', $this->nbphrases); ?><br/>
	</div>
	<div style="float:right;color:red;">
		<?php echo JText::_('COM_LOCALISE_THIS_IS_THE_REFERENCE_LANGUAGE'); ?>
	</div>
<?php else: ?>
	<div style="float:right;">
		<?php echo JText::sprintf('COM_LOCALISE_TOTAL_FILES', $this->total); ?><br/>
		<?php echo JText::sprintf('COM_LOCALISE_TOTAL_EXISTS', $this->totalexist); ?><br/>
	</div>
	<div style="float:right;">
		<?php echo JText::sprintf('COM_LOCALISE_TOTAL_PHRASES', $this->nbphrases); ?><br/>
		<?php echo JText::sprintf('COM_LOCALISE_TOTAL_CHANGED', $this->changed); ?><br/>
	</div>
	<div style="float:right;">
		<span class="hasTip" title="<?php echo JText::sprintf('COM_LOCALISE_IN_PROGRESS', $this->changed); ?>">
			<?php $percentage = $this->nbphrases ? intval(100 * $this->changed / $this->nbphrases) : 0;?>
			<div  style="text-align:center;"><?php echo $percentage; ?>%</div>
			<div style="text-align:left;border:solid silver 1px;width:100px;height:8px;">
				<div style="height:100%; width:<?php echo $percentage; ?>% ;background:green;">
				</div>
			</div>
		</span>
	</div>
<?php endif; ?>
<div class="clr"></div>

