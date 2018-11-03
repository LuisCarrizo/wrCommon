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

	// no se usara esto de definir funciones en el namespace
	// 
	// echo 'hola Mundo ' . date("j/n/y G:i:s") . str_repeat("&", 50) . '<br>' . PHP_EOL;
	// define('_ff1' ,  ' * _ff1 * ' . date("j/n/y G:i:s") .  '<br>' . PHP_EOL);
	// function _ff2($breakLine = false){
	//     if ($breakLine) { echo _hr ;  } else { echo _ff ; }
	// }


	// OJO no se puede usar como autoexec, pues realmente se ejecuta la primera vez
	// que se invoca a la clase, y NO cuando se invoca al namespace

	// wrCommonFoundation::doSomething('autoexec function.... ');

	class wrCommonFoundation {

	   	function __construct(){ 			//function __construct($nombre,$numero){
	   		/* lcOri
	      	$this->nombre=$nombre; 
	      	$this->numero=$numero; 
	      	$this->peliculas_alquiladas=array(); 
	      	*/
	      	echo 'wrCommonFoundation __construct ' . _ff;
	   	} 

	   	static function Config(){
	   		$xConfig = array();
	   		$xConfigDefault = self::_readConfig('default');
	   		$xConfigApp = self::_readConfig('app');
	   		$xConfigRoot = self::_readConfig('root');
	   		$xConfig = array_merge( $xConfigDefault , $xConfigRoot , $xConfigApp );
// var_export($xConfig);
	   		return $xConfig;
	   	}

	   	static private function _readConfig($pInstance){
	   		$xReturn = array();
	   		switch ($pInstance) {
	   			case 'app':
	   				$configFile = dirname($_SERVER["SCRIPT_FILENAME"])  ;
	   				break;
	   			case 'root':
	   				$configFile = $_SERVER['DOCUMENT_ROOT']  ;
	   				break; 
	   			case 'default':	  			
	   			default:
	   				$configFile = __DIR__ ;
	   				break;
	   		}
	   		$configFile .= '/config.php' ;
// var_export($configFile);
	   		// check if config file exists
   			if (file_exists($configFile)) {
   				include $configFile;
// var_export($xConfig);   				
   				$xReturn = $xConfig;
			}
// var_export($xReturn); 
			return $xReturn;

	   	}


	   	/* --- tests ---------------------------------------------- */

    	static function doSomething($pMsg = false) {
// lcOK echo dirname($_SERVER["SCRIPT_FILENAME"]) . _ff;
			return  ($pMsg) ? $pMsg : 'la fecha y hora es.....'   ;

	    	// lcOK echo 'la fecha y hora es.....' . ( ($pMsg) ? $pMsg : '' ) ;
	    }

		static function _now($pNewLine = false , $short = false){
		    $return = $short ? date("j/n/y G:i:s")  : date("Y-m-d H:i:s");
		    $return .= ($pNewLine ) ? _ff : '';
		    return $return ;
		}

		static function _ff($breakLine = false){
		    if ($breakLine) { echo _hr ;  } else { echo _ff ; }
		}

		public static $precio = 'atributo estático ';

	}


