<?php 
	/**
 	* App ajax
 	*
 	* @package App-Admin
 	* @subpackage Admim 
 	*/
	@header( 'Content-Type: text/html; charset=utf-8' );
	@header( 'X-Robots-Tag: noindex' );

	require "../app-include/ajax.php";
	
	require "../app-include/app-functions.php";
	
	require "../config.php";

	require "../core/help/auto_load.class.php";

	$controle = $_REQUEST['controle'];
	$metodo   = $_REQUEST['metodo'];
	
	$rotas = array("login"=> "Core\\login\\login", "usuario"=> "Core\\usuario\\usuario" );

	use Core\Help\AutoLoad;
	// Definindo caminho root para o autoload
	AutoLoad::setRootDir( DIR_BASE );
	// Registrando o auto load
	spl_autoload_register( array( 'Core\Help\AutoLoad', 'registerLoad' ) );

	$acao = new $rotas[$controle]();
	$acao->$metodo( $_REQUEST );