<?php

/***************************************************************
 * Extension Manager/Repository config file for ext "w_chromephp".
 *
 * Auto generated 03-02-2013 00:36
 *
 * Manual updates:
 * Only the data in the array - everything else is removed by next
 * writing. "version" and "dependencies" must not be touched!
 ***************************************************************/

$EM_CONF[$_EXTKEY] = [
	'title' => 'ChromePHP / Chrome Logger - debug in Chrome console',
	'description' => 'Chrome\'s Developer tools Console php debug. Short call - just use cp(var);. ChromePHP globally included in TYPO. Respects DevIpMask. Needs Chrome Logger ext for Chrome. @See README for details. @See https://craig.is/writing/chrome-logger',
	'category' => 'plugin',
	'author' => 'wolo.pl \'.\' studio',
	'author_email' => 'wolo.wolski@gmail.com',
	'author_company' => '',
	'state' => 'stable',
	'uploadfolder' => 0,
	'clearCacheOnLoad' => 0,
	'version' => '0.3.0',
	'constraints' => [
		'depends' => [
			'typo3' => '4.5.0-10.4.99',
		],
		'conflicts' => [
		],
		'suggests' => [
		],
	],
];

?>