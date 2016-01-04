<?php 
	session_start();

	ini_set('display_errors', 1);
	/** configuracoes */
	require "config.php";

	/** start do app */
	require "core/app.init.php";