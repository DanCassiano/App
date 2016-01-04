<?php 
	/**
	* AutoLoad
	*/
	class AutoLoad
	{
		private $diretorios;

		private $app_root;

		function __construct(){ }

		public function setDirretorios( array $diretorios ) {
			$this->diretorios = $diretorios;
		}

		public  function setRootDir( $app_root ) {
			$this->app_root = $app_root;
		}

		public  static function registerLoad( $class ) {
			
			foreach($this->diretorios as $dir) { 
				$class = strtolower(preg_replace('/(?|([a-z\d])([A-Z])|([^\^])([A-Z][a-z]))/', '$1_$2', $class)); 
				$file = $this->app_root."/".$dir.'/'.$class. '.class.php';

				if (file_exists($file)) {
					require $file;
					break; 
				}
			}
		}
	}