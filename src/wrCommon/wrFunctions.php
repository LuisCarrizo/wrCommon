<?php
	//
	// set SESSION on
	if (session_status() == PHP_SESSION_NONE) {	session_start();}
	// general settings
	ini_set('max_execution_time', 600);

// just for debug
	define('_ff' , '<br>' . PHP_EOL);
	define('_hr' , '<hr>' . PHP_EOL);
//just for debug
echo 'Actual file:  ' . __FILE__ . _ff;

	// include main class
	include 'wrCommonFoundation.php' ;	
	use wrCommon\wrCommonFoundation as wr;
	// read Config File (1 - APP , 2 - ROOT , 3 - DEFAULT)
	$xConfig = array_change_key_case(wr::Config() , CASE_LOWER);
_log($xConfig);
	// Define Global Constants
	if (isset($xConfig['rootPath'] )  && $xConfig['rootPath'] )  {
		define('ROOT' , $_SERVER['DOCUMENT_ROOT'] );
	} else {
		define('ROOT' , dirname($_SERVER["SCRIPT_FILENAME"]) );
	}
_log(ROOT);
	if (isset($xConfig['time_zone'] )  && $xConfig['timeZone'] )  {
		date_default_timezone_set($xConfig['time_zone']);
	} else {
		date_default_timezone_set('America/Argentina/Buenos_Aires');
	}
_log(date_default_timezone_get() );

	// default Definitions
	define('LOGS' , ROOT . '/logs/');
	define('INC', ROOT . '/include/');
	define('TEMPLATES', ROOT . '/templates/');
	define('PLUGINS', ROOT . '/plugins/');
	define('SMART', PLUGINS . 'smart/');
	define('IMG', ROOT . '/img/');
	define('BKG', IMG . 'bkg/');

	// Static Definition
	// lcOri define('INCPHP', dirname(dirname(ROOT)) . '/php-include/');
	define('INCPHP', dirname($_SERVER['DOCUMENT_ROOT']) . '/php-include/');
_log(INCPHP );			// aka!!!!
	// APP Specific Definitions
	define('INCDB' , INCPHP  . "smartmail/db/");
	define('INCMAIL' , INCPHP  . "smartmail/mail/");





// lcOK echo 'wrFunctions.php' . _ff;
// lcOK echo  __DIR__  . _ff ; //     muestra la ruta de la funcion dentro de arbol de carpetas del paquete

// lcOK echo 'dirname($_SERVER["SCRIPT_FILENAME"])' . _ff;
// lcOK echo dirname($_SERVER["SCRIPT_FILENAME"]) . _ff;

// lcOK echo 'getcwd()' . _ff;
// lcOK echo getcwd() . _ff ;  //Be aware that any call to chdir() will change the working directory, though

// lcOK echo '_ff8() dentro de wrFunctions' ;
// lcOK _ff8(1);



/* NO es lo requerido, devuelve: D:\bakw\Dropbox\dev\test\test03\vendor\composer\autoload_real.php 
$trace = debug_backtrace();
print_r( $trace ) ; echo  _ff ;
echo $trace[0]['file'] . _ff;
*/


function _ff8($breakLine = false){
    if ($breakLine) { echo _hr ;  } else { echo _ff ; }
}

function _log($Content = false) {
	if ($Content) {
		echo '<pre>';
		var_export($Content);
		echo '</pre>';
	} else {
		print_r('no content') ;
	}
	_ff8();
}