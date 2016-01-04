<?php 
	
	require "class/auto_load.class.php";

	spl_autoload_register( array( 'AutoLoad', 'registerLoad' ) );