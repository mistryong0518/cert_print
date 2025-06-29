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
use Joomla\CMS\MVC\Controller\AdminController;

class CertificatePrinterController extends AdminController
{
    public function uploadTemplate()
    {
        // Check for request forgeries
        $this->checkToken();

        $app = Factory::getApplication();
        $input = $app->input;
        $files = $input->files->get('jform', array(), 'array');

        // Process file upload
        if (!empty($files['template_file'])) {
            $file = $files['template_file'];
            
            // Validate file type (only images allowed)
            $allowedTypes = array('image/jpeg', 'image/png', 'image/gif');
            if (!in_array($file['type'], $allowedTypes)) {
                $app->enqueueMessage('Only JPG, PNG or GIF files are allowed.', 'error');
                $this->setRedirect('index.php?option=com_certificate_printer');
                return false;
            }

            // Move uploaded file to component directory
            $destination = JPATH_COMPONENT . '/templates/' . $file['name'];
            if (move_uploaded_file($file['tmp_name'], $destination)) {
                $app->enqueueMessage('Template uploaded successfully!', 'message');
            } else {
                $app->enqueueMessage('Error uploading template.', 'error');
            }
        }

        $this->setRedirect('index.php?option=com_certificate_printer');
    }

    public function getModel($name = 'Template', $prefix = 'CertificatePrinterModel', $config = array('ignore_request' => true))
    {
        return parent::getModel($name, $prefix, $config);
    }
}