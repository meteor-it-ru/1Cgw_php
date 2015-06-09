<?php
//ini_set('soap.wsdl_cache_enabled', '0');
ini_set('soap.wsdl_cache_ttl', '0'); 

//require_once 'init.php';
require_once 'OneC/Wsdl/Server.php';
require_once 'OneC/Wsdl/Client.php';

class OneCGateway{

	public function __construct() {
		//parent::__construct($GLOBALS['registry']);
	}

	/**
   * @return string
   */
	public function getInfoServer() {

		$fp = fopen( "./log_set_message.log", "r" );
		$contents = fread($fp, filesize("./log_set_message.log"));
		
		return "SERVER_NAME: ".$_SERVER['SERVER_NAME']."\r\n"
				."SERVER_ADDR: ".$_SERVER["SERVER_ADDR"]."\r\n"
				."log_set_message.log: "."\r\n".$contents;

	}

	/**
   * @param string
   */
	public function setMessage($message) {

		$fp = fopen( "./log_set_message.log", "a+" );
		fwrite($fp, $message."\r\n");
		fclose($fp);
	}
  
}

$server = new OneC_Wsdl_Server();
$server->setService('OneCGateway');
$server->handle();

?>