<?php 
	namespace Core\Controller;

	interface FrontController
	{
		public function setController($controller);
		public function setAction($action);
		public function setParams(array $params);
		public function setQuery( array $query );
		public function setBaseDir( $dir );
		public function run();
	}