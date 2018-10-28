
<?php
/*
 * This file is part of the wrCommon package.
 *
 * (c) Luis Carrizo<lcarrizo@wikired.com.ar>
 *
 * For the full copyright and license information, please view the LICENSE
 * file that was distributed with this source code.
 */
namespace wrCommon;

// basic configuration
if (session_status() == PHP_SESSION_NONE) {	session_start();}
ini_set('max_execution_time', 600);
date_default_timezone_set('America/Argentina/Buenos_Aires');
define('ROOT' , $_SERVER['DOCUMENT_ROOT']);
define('LOGS' , ROOT . '/cronMaster/logs/');
define('INC', ROOT . '/include/');
define('TEMPLATES', ROOT . '/templates/');
define('PLUGINS', ROOT . '/plugins/');
define('SMART', PLUGINS . 'smart/');
define('IMG', ROOT . '/img/');
define('BKG', IMG . 'bkg/');
// lcOri define('INCPHP', dirname(dirname(ROOT)) . '/php-include/');
define('INCPHP', dirname(ROOT) . '/php-include/');
define('INCDB' , INCPHP  . "smartmail/db/");
define('INCMAIL' , INCPHP  . "smartmail/mail/");

define('_ff' , '<br>' . PHP_EOL);
define('_hr' , '<hr>' . PHP_EOL);

