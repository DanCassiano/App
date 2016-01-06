<?php 
	namespace Core\Controller;
	/**
	* AppAdminController
	*/
	class AppAdminController
	{
		
		public function render( $action, $parametros, $query){
			
			$s = new \Core\Session();
			$s->start();
			
			$s->t = "arroz";
			var_dump( $s, $_SESSION );
		}

		private function isLogin() {

		}

	}