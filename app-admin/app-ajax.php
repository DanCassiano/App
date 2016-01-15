<?php 
/**
 * App ajax
 *
 * @package App-Admin
 * @subpackage Admim 
 */


	@header( 'Content-Type: text/html; charset=utf-8' );
	@header( 'X-Robots-Tag: noindex' );


	$dados = array();

	for( $i = 0; $i < rand(1,50); $i++ ) {
		$dados[] = array( "id"=> $i, "package"=> "Lorem {$i}" );
	}

	echo json_encode( $dados );