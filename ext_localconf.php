<?php
if (!defined ('TYPO3_MODE')) {
 	die ('Access denied.');
}


$boot = function () {
    
    if (version_compare(TYPO3_version, '10.0.0', '<')) {
        $extConf = isset($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['w_chromephp']) ? unserialize($GLOBALS['TYPO3_CONF_VARS']['EXT']['extConf']['w_chromephp']) : [];
        $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['w_chromephp'] = $extConf;
    }
    else    {
        $extConf = $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['w_chromephp'];
    }
    
    
    
    // include ChromePHP lib
    require_once (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('w_chromephp') . 'Private/PHP/ChromePhp/ChromePhp.php');


    // include short call functions
    if ($extConf['includeShorthands'])  {
        require_once (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('w_chromephp') . 'Private/PHP/shorthands.php');
    }
};

$boot();
unset($boot);
