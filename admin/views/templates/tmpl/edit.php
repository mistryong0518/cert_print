<?php
/**
 * @package     Certificate_Printer
 * @subpackage  com_certificate_printer
 *
 * @copyright   Copyright (C) 2023. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Factory;
use Joomla\CMS\Language\Text;
use Joomla\CMS\HTML\HTMLHelper;

HTMLHelper::_('behavior.formvalidator');
HTMLHelper::_('behavior.keepalive');

$app = Factory::getApplication();
$input = $app->input;
?>

<form action="<?php echo JRoute::_('index.php?option=com_certificate_printer&layout=edit&id=' . (int) $this->item->id); ?>"
      method="post" name="adminForm" id="template-form" class="form-validate" enctype="multipart/form-data">
    
    <div class="form-horizontal">
        <fieldset class="adminform">
            <legend><?php echo Text::_('COM_CERTIFICATE_PRINTER_TEMPLATE_UPLOAD'); ?></legend>
            
            <div class="control-group">
                <div class="control-label">
                    <label for="template_file"><?php echo Text::_('COM_CERTIFICATE_PRINTER_TEMPLATE_FILE'); ?></label>
                </div>
                <div class="controls">
                    <input type="file" name="jform[template_file]" id="template_file" accept="image/jpeg,image/png,image/gif" />
                    <p class="help-block"><?php echo Text::_('COM_CERTIFICATE_PRINTER_TEMPLATE_FILE_HELP'); ?></p>
                </div>
            </div>
        </fieldset>
    </div>
    
    <input type="hidden" name="task" value="template.upload" />
    <?php echo HTMLHelper::_('form.token'); ?>
</form>