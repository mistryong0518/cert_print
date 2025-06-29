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

// Get application
$app = Factory::getApplication();

// Get template files
$templateDir = JPATH_COMPONENT . '/templates/';
$templates = glob($templateDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);

// Get selected template
$selectedTemplate = $app->input->getString('template', basename($templates[0]));
?>

<div class="certificate-printer">
    <h2><?php echo Text::_('COM_CERTIFICATE_PRINTER_TITLE'); ?></h2>
    
    <form action="<?php echo JRoute::_('index.php?option=com_certificate_printer&task=print'); ?>" method="post" id="certificateForm">
        
        <?php if (count($templates) > 1): ?>
        <div class="control-group">
            <label for="template"><?php echo Text::_('COM_CERTIFICATE_PRINTER_SELECT_TEMPLATE'); ?></label>
            <select name="template" id="template" class="form-control">
                <?php foreach ($templates as $template): ?>
                    <?php $filename = basename($template); ?>
                    <option value="<?php echo $filename; ?>" <?php echo ($filename === $selectedTemplate) ? 'selected' : ''; ?>><?php echo $filename; ?></option>
                <?php endforeach; ?>
            </select>
        </div>
        <?php endif; ?>
        
        <div class="control-group">
            <label for="name"><?php echo Text::_('COM_CERTIFICATE_PRINTER_ENTER_NAME'); ?></label>
            <input type="text" name="name" id="name" class="form-control" required />
        </div>
        
        <input type="hidden" name="landscape" value="1" />
        
        <button type="submit" class="btn btn-primary" onclick="window.print(); return false;">
            <?php echo Text::_('COM_CERTIFICATE_PRINTER_PRINT_BUTTON'); ?>
        </button>
        
        <?php echo JHtml::_('form.token'); ?>
    </form>
</div>

<style>
@media print {
    @page {
        size: A4 landscape;
        margin: 0;
    }
    body * {
        visibility: hidden;
    }
    .certificate-container, .certificate-container * {
        visibility: visible;
    }
    .certificate-container {
        position: absolute;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
    }
    .no-print {
        display: none;
    }
}
</style>