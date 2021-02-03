10.4 - compat updated version (looks like people still install this ext, so I made a compat release)
IMPORTANT:
This ext seems to work in 10.4, but the Chrome's ext Chrome Logger - seems to not.
Let me know if you managed this to work.



This extension includes Chrome Logger (previously known as ChromePhp) script. It also provides short functions to quick use
and developer ip control (devIPMask).

@See https://craig.is/writing/chrome-logger

All copyright to Chrome Logger. This TYPO3 extension only includes it to automatic use in TYPO3 environment.


If you have better ideas, how this extension could work, or what to improve, write me: wolo.wolski(at)gmail.com



MANUAL:

You don't need to include any script in code - just install this extension
and Chrome Logger extension for Chrome:
https://chrome.google.com/webstore/detail/chrome-logger/noaneddfkdjfnfdakjjmocngnfkfehhd

(Chrome Logger has to be enabled in browser using button on toolbar)




USAGE:

You can use it two ways:

** Original:

  ChromePhp::info($var);

	which displays debug always - not filtered by IP  
	(see manual of ChromePhp or search web for details)


** Quick secured:

  cp($var);
  
	which can display only when devIPmask is matched.
	
	This can be disabled on install / in extension configuration.
	Developer ip mask can be set in Install Tool on directly in typo3conf/localconf.php:
	$TYPO3_CONF_VARS['SYS']['devIPmask'] = '1.2.3.4';


 or only notice:
 
  cp('something');
 
 or with message type:

  cp($var, 'info'); 

	


Types of debug display are:

warn
error
info


you can pass them as third param:

 cp($var, 'something', 'warn');

...or use shorts:
cpInfo($var, 'something');
cpWarn($var, 'something');
cpError($var, 'something');




You can also use groups:

cpGroup('my group');		// type 'group', or:
cpGroup('my group', true);	// type 'groupCollapsed'

// here some cp() calls
// and
cpGroupEnd();





KNOWN PROBLEMS:


- Debugging of objects seems not to work in current version of Chrome Logger ext (4.1.0)




- The grouping seems not to work in current version of Chrome Logger ext (4.1.0)




- if you use in same time both ways, eg:
cp('abc', $var);
ChromePhp::log('abc', $var);

the second call won't have a backtrace file path. It's because the value of backtrace 
level is increased in typo extension include file (has to, to show it correctly) and
later is stored because ChromePhp is a singleton.

