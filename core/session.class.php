<?php 
	namespace Core;
	/**
	* Session
	*/
	class Session
	{
		private $nome;

		private $id;

		private $time =3600;
		
		function __construct() {

			if( !empty( session_id() ) ) {
				$this->nome = session_name();
				$this->id 	= session_id();
			}

		}

		public function reloadSession(){
			session_regenerate_id(true);
		}

		public function __get( $valor ) {

			if( empty( $this->$valor ) )
				$this->$valor = $_SESSION[ $valor ];

			return $this->$valor;
		}

		public function __set( $chave, $valor ) {
			
			if( empty( $_SESSION[ $chave ] ) )
				$_SESSION[ $chave ]  = $valor;

			$this->$chave = $valor;
		}

		public function start( $time = 3600, $nome = ""  ) {

			try {
				if( empty( session_id() ) ) {
					session_set_cookie_params($time);
					
					if( empty( $nome ))
						$nome = "app-".md5(md5( $_SERVER['REMOTE_ADDR'] . $_SERVER['HTTP_USER_AGENT'] ));

					session_name($nome);
					$this->nome = session_name();
					$this->id 	= session_id();
					$this->time = $time;
					// Reseta o tempo para expirar a sessao
					if (isset($_COOKIE[$this->nome]))
						setcookie($this->nome, $_COOKIE[$this->nome], time() + $time, "/");
					session_start();
				}
				else
					session_start();
			}
			catch (Exception $e) {
				throw new \InvalidArgumentException( $e->getMessage() );
			}
			
		}
	}
	