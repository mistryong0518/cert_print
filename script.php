<?php
/**
 * @package     Certificate_Printer
 * @subpackage  pkg_certificate_printer
 *
 * @copyright   Copyright (C) 2023. All rights reserved.
 * @license     GNU General Public License version 2 or later; see LICENSE.txt
 */

defined('_JEXEC') or die;

class pkg_certificate_printerInstallerScript
{
    public function install($parent)
    {
        // Create templates directory if it doesn't exist
        $templateDir = JPATH_ADMINISTRATOR . '/components/com_certificate_printer/templates';
        if (!file_exists($templateDir)) {
            mkdir($templateDir, 0755, true);
        }

        return true;
    }

    public function uninstall($parent)
    {
        // Optionally clean up during uninstallation
        return true;
    }

    public function update($parent)
    {
        return true;
    }

    public function preflight($type, $parent)
    {
        return true;
    }

    public function postflight($type, $parent)
    {
        return true;
    }
}