<?php 
	namespace Core;

	interface FrontController
	{
		public function setController($controller);
		public function setAction($action);
		public function setParams(array $params);
		public function setBaseDir( $dir );
		public function run();
	}