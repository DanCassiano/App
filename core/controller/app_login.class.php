<?php 
	namespace Controller;

	/**
	* AppLogin
	*/
	interface AppLogin
	{
		public function setUser( Core\User $usuario);
		public function getLogin();
		public function isLogin();
	}