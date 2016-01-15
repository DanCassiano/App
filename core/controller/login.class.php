<?php 
	namespace Core\Controller;

	/**
	* Login
	*/
	interface Login
	{
		public function setUser( User $usuario);
		public function getLogin();
		public function isLogin();
	}