<?php
/***************************************************************
 * This file is part of the TYPO3 CMS project.
 *
 * It is free software; you can redistribute it and/or modify it under
 * the terms of the GNU General Public License, either version 2
 * of the License, or any later version.
 *
 * For the full copyright and license information, please read the
 * LICENSE.txt file that was distributed with this source code.
 *
 * The TYPO3 project - inspiring people to share!
 ***************************************************************/

if (!class_exists(\WFP2\Wfp2Essentials\Service\ConfigurationService::class)) {
    require_once realpath(dirname(__FILE__) . '/ext/wfp2_essentials/Classes/Service/') . DIRECTORY_SEPARATOR . 'ConfigurationService.php';
}
/* @var $configurationService \WFP2\Wfp2Essentials\Service\ConfigurationService */
$configurationService = new \WFP2\Wfp2Essentials\Service\ConfigurationService();
$configuration = $configurationService->parseConfigurationFiles(array(
    10 => '*.yml',
));
$GLOBALS['TYPO3_CONF_VARS'] = array_replace_recursive($GLOBALS['TYPO3_CONF_VARS'], $configuration);