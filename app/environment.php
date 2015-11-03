<?php
/**
 * Environment configuration file for Base typo3 installation.
 * @author Sebastian Seidelmann <sebastian.seidelmann@wfp2.com>, wfp:2 GmbH & Co. KG
 */

/**
 * Defines the application path
 * @var string
 */
define('WFP2_PATH_APP',       realpath(__DIR__) . DIRECTORY_SEPARATOR);

/**
 * Defines the web path
 * @var string
 */
define('WFP2_PATH_WEB',       realpath(__DIR__ . '/../web/') . DIRECTORY_SEPARATOR);

/**
 * Defines the src path
 * @var string
 */
define('WFP2_PATH_SRC',       realpath(__DIR__ . '/../src/') . DIRECTORY_SEPARATOR);

/**
 * Defines the typo3conf path
 * @var string
 */
define('WFP2_PATH_TYPO3CONF', WFP2_PATH_SRC . 'typo3conf' . DIRECTORY_SEPARATOR);

/**
 * Defines the typo3conf/ext path
 * @var string
 */
define('WFP2_PATH_EXT',       WFP2_PATH_TYPO3CONF . 'ext' . DIRECTORY_SEPARATOR);

/**
 * Defines the typo3temp path
 * @var string
 */
define('WFP2_PATH_TYPO3TEMP', WFP2_PATH_APP . 'typo3temp' . DIRECTORY_SEPARATOR);