<?php
if (!defined ('TYPO3_MODE')) {
 	die ('Access denied.');
}

/***************************************************************
 *
 * Copyright notice
 *
 * (c) 2013-2016 wolo.pl '.' studio
 * All rights reserved
 *
 * This script is part of the Typo3 project. The Typo3 project is
 * free software; you can redistribute it and/or modify
 * it under the terms of the GNU General Public License as published by
 * the Free Software Foundation; either version 2 of the License, or
 * (at your option) any later version.
 *
 * The GNU General Public License can be found at
 * http://www.gnu.org/copyleft/gpl.html.
 * A copy is found in the textfile GPL.txt and important notices to the license
 * from the author is found in LICENSE.txt distributed with these scripts.
 *
 *
 * This script is distributed in the hope that it will be useful,
 * but WITHOUT ANY WARRANTY; without even the implied warranty of
 * MERCHANTABILITY or FITNESS FOR A PARTICULAR PURPOSE. See the
 * GNU General Public License for more details.
 *
 * This copyright notice MUST APPEAR in all copies of the script!
 *
 ***************************************************************/



/**
 * @author A. wolo Wolski <wolo.wolski@gmail.com>
 */
function cp() {
	$extConf = $GLOBALS['TYPO3_CONF_VARS']['EXTENSIONS']['w_chromephp'];

	if ($extConf['useDevIPmask'] || !isset($extConf['useDevIPmask'])) {
		$ip = $GLOBALS['TYPO3_CONF_VARS']['SYS']['devIPmask'];
	} else	{
		$ip = '*';
	}

    if (!\TYPO3\CMS\Core\Utility\GeneralUtility::cmpIP(cp_getRealIpAddr(), $ip))
		return;

	$ChromePhp = ChromePhp::getInstance();
	$ChromePhp->addSetting( ChromePhp::BACKTRACE_LEVEL, 2 );

	$argc = func_get_args();

	$label = $argc[0];
	$var = $argc[1];
	
	if (isset($argc[2]))	{
		$type = $argc[2];
		switch($type)   {
			case 'info':
				$ChromePhp->info($label, $var);
				break;
			case 'warn':
				$ChromePhp->warn($label, $var);
				break;
			case 'error':
				$ChromePhp->error($label, $var);
				break;
			default:
				$ChromePhp->log($label, $var);
		}
	} else if (isset($argc[1]))	{
		$ChromePhp->log($label, $var);	
	} else	{
		$ChromePhp->log($label);
	}
}

function cpInfo($var, $label = '')    {
	cp($var, $label, 'info');
}

function cpWarn($var, $label = '')    {
	cp($var, $label, 'warn');
}

function cpError($var, $label = '')    {
	cp($var, $label, 'error');
}


/* grouping */

function cpGroup($name = '', $collapsed = false)	{
	cp('', $name, $collapsed ? 'groupCollapsed' : 'group');
}

function cpGroupEnd()	{
	cp('', '', 'groupEnd');
}


/* tech */

function cp_getRealIpAddr() {
	if (!empty($_SERVER['HTTP_CLIENT_IP'])) {   //check ip from shared internet
		$ip = $_SERVER['HTTP_CLIENT_IP'];
	} elseif (!empty($_SERVER['HTTP_X_FORWARDED_FOR'])) {   //to check ip is pass from proxy
		$ip = $_SERVER['HTTP_X_FORWARDED_FOR'];
	} else {
		$ip = $_SERVER['REMOTE_ADDR'];
	}
	return $ip;
}


