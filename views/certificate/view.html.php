<?php
/**
 * @package     Certificate_Printer
 * @subpackage  com_certificate_printer
 *
 * @copyright   Copyright (C) 2023. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\MVC\View\HtmlView;

class CertificatePrinterViewCertificate extends HtmlView
{
    public function display($tpl = null)
    {
        $app = Factory::getApplication();
        $input = $app->input;

        // Get template files
        $this->templates = CertificatePrinterHelper::getTemplates();
        $this->selectedTemplate = $input->getString('template', basename($this->templates[0]));

        parent::display($tpl);
    }
}