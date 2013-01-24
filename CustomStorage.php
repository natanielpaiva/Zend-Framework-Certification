<?php 
	//require_once 'Zend/Version.php';
	 //echo  Zend_Version::VERSION;

	require_once 'Zend/Loader.php';
	Zend_Loader::registerAutoload();

	$auth = Zend_Auth::getInstance();
	
	class CustomStorage implements Zend_Auth_Storage_Interface
	{

		
		function __construct()
		{
			Zend_Debug::dump($auth);
			
		}

	    public function isEmpty(){}

	    public function read(){}

	    public function write($contents){}

	    public function clear(){}
	}	
	