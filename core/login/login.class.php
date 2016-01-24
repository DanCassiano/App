<?php 
	namespace Core\Login;

	/**
	* Login
	*/
	class Login
	{
		
		public function logar( $dados ){
			$user = new \Core\Usuario\Usuario();
			$d =$user->get( "id"," WHERE login=:login ","login={$dados['login']}" );
			if( $d ) {
				$s = new \Core\Session();
				// $s->start();
				$s->id = $d[0]['id'];
				echo json_encode( array("status"=> 1) );
			}
			else
				echo json_encode( array("status"=> 0) );
		}

		public function logout( $id ) {

			unset($_SESSION['id']);

			echo json_encode( array("status"=>1));
		}
		
	}