<?php 
	class Url
	{
		private static $url = null;
		private static $query = null;
		private static $baseUrl = null;

		public static function getURL( $id )
		{
			if( self::$url == null ) // Verifica se a lista de URL já foi preenchida	
				self::getURLList();
			
			// Valida se existe o ID informado e retorna.
			if( isset( self::$url[ $id ] ) )
				return self::$url[ $id ];

			// Caso não exista o ID, retorna nulo
			return null;
		}

		public static function getQuery( $id )
		{
			if( self::$query == null ) // Verifica se a lista de URL já foi preenchida
				self::getURLList();

			// Valida se existe o ID informado e retorna.
			if( isset( self::$query[ $id ] ) )
				return self::$query[ $id ];
			// Caso não exista o ID, retorna nulo
			return null;
		}

		public static function getBase()
		{
			if( self::$baseUrl != null )
				return self::$baseUrl;
			
			global $_SERVER;
			$startUrl = strlen( $_SERVER["DOCUMENT_ROOT"] );
			$excludeUrl = substr( $_SERVER["SCRIPT_FILENAME"], $startUrl, -9 );
			if( $excludeUrl[0] == "/" )
				self::$baseUrl = $excludeUrl; 
			else
				self::$baseUrl = "/" . $excludeUrl;
			return self::$baseUrl;
		}
	
		private static function getURLList()
		{
			global $_SERVER;

			$dados = @parse_url( $_SERVER['REQUEST_URI'] );
			$url = "";
			$query = "";
			if( !empty( $dados['path'] ))
				self::$url = explode( "/", trim( $dados['path'] , '/') );
			if( !empty( $dados['query'] ))
				@parse_str($dados['query'], self::$query);
		}
}