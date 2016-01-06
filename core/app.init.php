<?php 
	
	if( defined("DEBUG") && DEBUG == true ) 
		ini_set('display_errors', 1);

	/** classe de autoload */
	require "help/auto_load.class.php";

	use \Core,
		\Core\Controller;

	// Definindo caminho root para o autoload
	Core\Help\AutoLoad::setRootDir( DIR_BASE );
	// Pastas contendo as classes
	Core\Help\AutoLoad::setDirretorios( array("core", 'core/class', 'core/controller' ));
	// Registrando o auto load
	spl_autoload_register( array( 'Core\Help\AutoLoad', 'registerLoad' ) );

	$front = new Core\Controller();
	$front->run();
