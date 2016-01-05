<?php 
	
	namespace Core;
	/**
	* AutoLoad
	* @autor Jordan de Sousa Cassiano
	*/
	class AutoLoad
	{
		/** @var array array com os diretorios para procurar as classes */
		private static $diretorios;

		/** @var string caminho de onde partir para as pastas */
		private static $app_root;

		/**
		 * Seta o caminho padrao
		 * @param array $diretorios array com os diretorios
		 */
		public static function setDirretorios( array $diretorios ) {
			self::$diretorios = $diretorios;
		}

		/**
		 * define o caminho inicial do projeto
		 * @param string $app_root caminho
		 */
		public static function setRootDir( $app_root ) {
			self::$app_root = $app_root;
		}

		/** Funcao para registro do autoload */
		public  static function registerLoad( $class ) {
			
			$class = explode("\\",$class);

			$class = end($class);

			foreach(self::$diretorios as $dir) { 
				$class = strtolower(preg_replace('/(?|([a-z\d])([A-Z])|([^\^])([A-Z][a-z]))/', '$1_$2', $class)); 
				$file = self::$app_root."/".$dir.'/'.$class. '.class.php';

				if (file_exists($file)) {
					require $file;
					break; 
				}
			}
		}
	}