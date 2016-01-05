<?php 
	
	if( defined("DEBUG") && DEBUG == true ) 
		ini_set('display_errors', 1);


	/** classe de autoload */
	require "help/auto_load.class.php";

	use \Core;

	// Definindo caminho root para o autoload
	Core\AutoLoad::setRootDir( DIR_BASE );
	
	// Pastas contendo as classes
	Core\AutoLoad::setDirretorios( array( 'core/class', 'core/controller' ));
	
	// Registrando o auto load
	spl_autoload_register( array( 'Core\AutoLoad', 'registerLoad' ) );

	$front = new Core\Controller();
	$front->run();
