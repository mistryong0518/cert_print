<?php
/**
 * @package     Certificate_Printer
 * @subpackage  com_certificate_printer
 *
 * @copyright   Copyright (C) 2023. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

class CertificatePrinterHelper
{
    public static function getTemplates()
    {
        $templateDir = JPATH_COMPONENT . '/templates/';
        
        if (!file_exists($templateDir)) {
            mkdir($templateDir, 0755, true);
        }
        
        return glob($templateDir . '*.{jpg,jpeg,png,gif}', GLOB_BRACE);
    }
    
    public static function addSubmenu($vName = '')
    {
        JHtmlSidebar::addEntry(
            JText::_('COM_CERTIFICATE_PRINTER_SUBMENU_CERTIFICATES'),
            'index.php?option=com_certificate_printer',
            $vName == 'certificates'
        );
    }
}