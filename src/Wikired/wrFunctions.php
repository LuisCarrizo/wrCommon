<?php
	//
echo __DIR__ . ' - ' . __FILE__;
	// set SESSION on
	if (session_status() == PHP_SESSION_NONE) {	session_start();}
	// general settings
	ini_set('max_execution_time', 600);
	error_reporting(E_ALL);
	define('_ff' , '<br>' . PHP_EOL);
	define('_hr' , '<hr>' . PHP_EOL);

	// read Config File (1 - APP , 2 - ROOT , 3 - DEFAULT)
	$xConfigTemp= array();
	$configFile = array();
	$configFile[1] = __DIR__ . '/config.php';
	$configFile[2] = $_SERVER['DOCUMENT_ROOT']. '/config.php';
	$configFile[3] = dirname($_SERVER["SCRIPT_FILENAME"]) . '/config.php';

	for ($i = 1; $i <= 3; $i++) {
		if (file_exists( $configFile[$i] ) ) {
			$xConfigTemp[$i] = include $configFile[$i] ;
		} else {
			$xConfigTemp[$i] = [];
		}
	};	
	$xConfig = array_change_key_case( array_merge( $xConfigTemp[1] , $xConfigTemp[2] , $xConfigTemp[3] ), CASE_LOWER);

// _log( $xConfig) ;

	// include main class
	// include 'wrCommonFoundation.php' ;	
	// use wrCommon\wrCommonFoundation as wr;
	
// 	$xConfig = array_change_key_case(wr::Config() , CASE_LOWER);
// _log($xConfig);
	// Define Global Constants
	if (isset($xConfig['rootPath'] )  && $xConfig['rootPath'] )  {
		define('ROOT' , $_SERVER['DOCUMENT_ROOT'] );
	} else {
		define('ROOT' , dirname($_SERVER["SCRIPT_FILENAME"]) );
	}
	if (isset($xConfig['timeZone'] )  && $xConfig['timeZone'] )  {
		date_default_timezone_set($xConfig['timeZone']);
	} else {
		date_default_timezone_set('America/Argentina/Buenos_Aires');
	}
	if (isset($xConfig['devMode'] )  && $xConfig['devMode'] )  {
		ini_set('display_errors','On');
	} else {
		ini_set('display_errors','Off');
	}

	// default Definitions
	define('LOGS' , ROOT . '/logs/');
	ini_set('error_log', LOGS . 'php_error.log');
	define('INC', ROOT . '/include/');
	define('TEMPLATES', ROOT . '/templates/');
	define('PLUGINS', ROOT . '/plugins/');
	// define('SMART', PLUGINS . 'smart/');
	define('IMG', ROOT . '/img/');
	define('BKG', IMG . 'bkg/');
	// Static Definition
	define('INCPHP', dirname($_SERVER['DOCUMENT_ROOT']) . '/php-include/');
	if ( isset($xConfig['appName'] ) && $xConfig['appName'] )  {
		$xConfig['appName'] = INCPHP  . $xConfig['appName'];
	} else {
		$xConfig['appName'] = INCPHP  . 'wikired/';
	}

	// APP Specific Definitions
	define('INCDB' , $xConfig['appName']  . "db/");
	define('INCMAIL' , $xConfig['appName']  . "mail/");

	// general use Functions

	function _ff($breakLine = false){
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
	}

	function _isLocalhost(){
	    $localHosts = array('smart.net' ,   'dev.net'  , 'wp-local');
	    $whitelist = array( '127.0.0.1', '::1');
	    return in_array($_SERVER['REMOTE_ADDR'], $whitelist) || in_array($_SERVER["HTTP_HOST"] , $localHosts);
	}

	function _left($str, $length) {
	    return substr($str, 0, $length);
	}

	function _right($str, $length) {
	    return substr($str, -$length);
	}