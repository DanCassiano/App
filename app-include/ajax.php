<?php 

	function getHttpOrigin() {
		$origin = '';
		if ( ! empty ( $_SERVER[ 'HTTP_ORIGIN' ] ) )
			$origin = $_SERVER[ 'HTTP_ORIGIN' ];

		return $origin;
	}
