<?php
/**
 * @package     Certificate_Printer
 * @subpackage  com_certificate_printer
 *
 * @copyright   Copyright (C) 2023. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\MVC\Model\ListModel;

class CertificatePrinterModelTemplates extends ListModel
{
    public function __construct($config = array())
    {
        parent::__construct($config);
    }

    protected function getListQuery()
    {
        $db = $this->getDbo();
        $query = $db->getQuery(true);

        $query->select('*')
              ->from($db->quoteName('#__certificate_printer_templates'));

        return $query;
    }

    public function uploadTemplate($file)
    {
        $templateDir = JPATH_COMPONENT . '/templates/';
        
        if (!file_exists($templateDir)) {
            mkdir($templateDir, 0755, true);
        }

        $destination = $templateDir . $file['name'];
        
        if (move_uploaded_file($file['tmp_name'], $destination)) {
            return true;
        }
        
        return false;
    }
}