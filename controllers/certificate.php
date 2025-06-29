<?php
/**
 * @package     Certificate_Printer
 * @subpackage  com_certificate_printer
 *
 * @copyright   Copyright (C) 2023. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Controller\BaseController;

class CertificatePrinterControllerCertificate extends BaseController
{
    public function print()
    {
        // Check for request forgeries
        $this->checkToken();

        $app = Factory::getApplication();
        $input = $app->input;

        // Get input data
        $name = $input->getString('name', '');
        $template = $input->getString('template', '');
        $landscape = $input->getBool('landscape', true);

        // Validate inputs
        if (empty($name)) {
            $app->enqueueMessage('Please enter your name', 'error');
            $this->setRedirect('index.php?option=com_certificate_printer');
            return false;
        }

        if (empty($template)) {
            $app->enqueueMessage('No template selected', 'error');
            $this->setRedirect('index.php?option=com_certificate_printer');
            return false;
        }

        // Set view for printing
        $view = $this->getView('certificate', 'html');
        $view->setLayout('print');
        $view->name = $name;
        $view->template = $template;
        $view->landscape = $landscape;
        $view->display();

        return true;
    }
}