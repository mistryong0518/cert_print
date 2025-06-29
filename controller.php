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

class CertificatePrinterController extends BaseController
{
    public function display($cachable = false, $urlparams = array())
    {
        $view = $this->input->get('view', 'certificate');
        $this->input->set('view', $view);

        parent::display($cachable, $urlparams);

        return $this;
    }
}