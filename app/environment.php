<?php
/**
 * Created by PhpStorm.
 * User: sebastianseidelmann
 * Date: 03.11.15
 * Time: 15:51
 */

define('WFP2_PATH_APP',       realpath(__DIR__) . DIRECTORY_SEPARATOR);
define('WFP2_PATH_WEB',       realpath(__DIR__ . '/../web/') . DIRECTORY_SEPARATOR);
define('WFP2_PATH_SRC',       realpath(__DIR__ . '/../src/') . DIRECTORY_SEPARATOR);
define('WFP2_PATH_TYPO3CONF', WFP2_PATH_SRC . 'typo3conf' . DIRECTORY_SEPARATOR);
define('WFP2_PATH_EXT',       WFP2_PATH_TYPO3CONF . 'ext' . DIRECTORY_SEPARATOR);
define('WFP2_PATH_TYPO3TEMP', WFP2_PATH_APP . 'typo3temp' . DIRECTORY_SEPARATOR);