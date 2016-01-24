<?php 
	
	
	if( defined("DEBUG") && DEBUG == true ) 
		ini_set('display_errors', 1);

	/** classe de autoload */
	require "help/auto_load.class.php";

	use Core\Controller\Controller,
		Core\Help\AutoLoad;

	// Definindo caminho root para o autoload
	AutoLoad::setRootDir( DIR_BASE );
	// Registrando o auto load
	spl_autoload_register( array( 'Core\Help\AutoLoad', 'registerLoad' ) );

	require DIR_BASE."/app-include/app-menu.php";

	require DIR_BASE."/app-include/app-functions.php";

	$front = new Controller();
	$front->run();