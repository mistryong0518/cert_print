<?php
/**
 * @package     Certificate_Printer
 * @subpackage  com_certificate_printer
 *
 * @copyright   Copyright (C) 2023. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

use Joomla\CMS\Application\CMSApplication;
use Joomla\CMS\Factory;
use Joomla\CMS\MVC\Controller\BaseController;

// Require helper file
JLoader::register('CertificatePrinterHelper', JPATH_COMPONENT . '/helpers/certificate_printer.php');

// Execute the task
$controller = BaseController::getInstance('CertificatePrinter');
$controller->execute(Factory::getApplication()->input->get('task'));
$controller->redirect();