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

// Get template path
$templatePath = JPATH_COMPONENT . '/templates/' . $this->template;

// Check if template exists
if (!file_exists($templatePath)) {
    throw new Exception('Certificate template not found');
}

// Get image dimensions
list($width, $height) = getimagesize($templatePath);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Certificate - <?php echo $this->name; ?></title>
    <style>
        @page {
            size: A4 landscape;
            margin: 0;
        }
        body {
            margin: 0;
            padding: 0;
        }
        .certificate-container {
            position: relative;
            width: 100%;
            height: 100vh;
        }
        .certificate-image {
            width: 100%;
            height: 100%;
            object-fit: contain;
        }
        .name-overlay {
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            font-size: 48px;
            font-weight: bold;
            color: #000;
            text-align: center;
        }
    </style>
</head>
<body>
    <div class="certificate-container">
        <img src="<?php echo JUri::root() . 'administrator/components/com_certificate_printer/templates/' . $this->template; ?>" class="certificate-image" />
        <div class="name-overlay"><?php echo $this->name; ?></div>
    </div>
</body>
</html>