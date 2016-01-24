<?php 

	function _s( $chave, $valor = "" ){

		if( empty( $valor ))
			return $_SESSION[ $chave ];

		return $_SESSION[ $chave ] = $valor;
	}