<?php 
	namespace Core\Usuario;

	/**
	* Usuarios
	*/
	class Usuario 
	{
		
		function __construct()
		{
			
		}

		public function get( $campos, $termos = "" , $binds = "" ) {
			$pdo = new \Core\Pdo();
			return $pdo->read("SELECT {$campos} FROM usuario {$termos}", $binds );
		}

		public function getUserLogado( $id ){
			$d = $this->get("id,login","WHERE id=:id","id={$id}");
			return $d[0];
		}

		public function lista( $d ) {
			echo json_encode($this->get("id, login, data_cadastro, ativo","LIMIT 0,100 "));
			// echo json_encode( array( array("id"=> 1, "login"=> "jordan")));
		}
	}