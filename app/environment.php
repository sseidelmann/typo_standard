<?php
/**
 * Environment configuration file for Base typo3 installation.
 * @author Sebastian Seidelmann <sebastian.seidelmann@wfp2.com>, wfp:2 GmbH & Co. KG
 */

/**
 * Defines the version.
 * @var string
 */
define('WFP2_TYPO3_BASE_VERSION', '1.0');

/**
 * Defines the application path
 * @var string
 */
define('WFP2_PATH_ROOT',       realpath(__DIR__ . '/../') . DIRECTORY_SEPARATOR);

/**
 * Defines the application path
 * @var string
 */
define('WFP2_PATH_APP',       WFP2_PATH_ROOT . 'app' . DIRECTORY_SEPARATOR);

/**
 * Defines the web path
 * @var string
 */
define('WFP2_PATH_WEB',       WFP2_PATH_ROOT . 'web' . DIRECTORY_SEPARATOR);

/**
 * Defines the src path
 * @var string
 */
define('WFP2_PATH_SRC',       WFP2_PATH_ROOT . 'src' . DIRECTORY_SEPARATOR);

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

/**
 * Class WFP2Environment
 * @author Sebastian Seidelmann <sebastian.seidelmann@wfp2.com>, wfp:2 GmbH & Co. KG
 */
class WFP2Environment
{
    /**
     * Returns the root path
     * @param bool|false $relative
     * @return string
     */
    static public function getRootPath($relative = false)
    {
        if ($relative) {
            return self::getPathRelative(self::getRootPath());
        }
        return WFP2_PATH_ROOT;
    }

    /**
     * @param bool|false $relative
     * @return string
     */
    static public function getWebPath($relative = false)
    {
        if ($relative) {
            return self::getPathRelative(self::getWebPath());
        }
        return WFP2_PATH_WEB;
    }

    /**
     * @param bool|false $relative
     * @return string
     */
    static public function getSrcPath($relative = false)
    {
        if ($relative) {
            return self::getPathRelative(self::getSrcPath());
        }
        return WFP2_PATH_SRC;
    }

    /**
     * @param bool|false $relative
     * @return string
     */
    static public function getAppPath($relative = false)
    {
        if ($relative) {
            return self::getPathRelative(self::getAppPath());
        }
        return WFP2_PATH_APP;
    }

    /**
     * @param bool|false $relative
     * @return string
     */
    static public function getTypo3ConfPath($relative = false)
    {
        if ($relative) {
            return self::getPathRelative(self::getTypo3ConfPath());
        }
        return WFP2_PATH_TYPO3CONF;
    }

    /**
     * @param bool|false $relative
     * @return string
     */
    static public function getTypo3TempPath($relative = false)
    {
        if ($relative) {
            return self::getPathRelative(self::getTypo3TempPath());
        }
        return WFP2_PATH_TYPO3TEMP;
    }

    /**
     * @param bool|false $relative
     * @return string
     */
    static public function getExtPath($relative = false)
    {
        if ($relative) {
            return self::getPathRelative(self::getExtPath());
        }
        return WFP2_PATH_EXT;
    }

    /**
     * Returns the relative path.
     * @param string $path the path
     * @return string
     */
    private static function getPathRelative($path)
    {
        return substr($path, strlen(WFP2_PATH_ROOT));
    }
}