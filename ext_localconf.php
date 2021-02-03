<?php
if (!defined ('TYPO3_MODE')) {
 	die ('Access denied.');
}


// include ChromePHP lib

require_once (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('w_chromephp') . '/ChromePhp/ChromePhp.php');


// include short call functions

if ($GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['w_chromephp']['includeShorthands'])  {
	require_once (\TYPO3\CMS\Core\Utility\ExtensionManagementUtility::extPath('w_chromephp') . '/shorthands.php');
}

