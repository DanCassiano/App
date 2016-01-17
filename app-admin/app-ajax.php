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
		$dados = array();

	if( $_GET['acao'] == "eventos") {

		for( $i = 0; $i < rand(1,50); $i++ ) {
			$dados[] = array( "id"=> $i, "title"=> "Lorem {$i}" );
		}
	}
	else {


		for( $i = 0; $i < rand(1,50); $i++ ) {
			$dados[] = array( "id"=> $i, "package"=> "Lorem {$i}" );
		}

	}

	echo json_encode( $dados );
