<?php 
	
	namespace Core\Help;
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

		private static function normalizeDir( $dir ){
			return str_replace(array("\\"), "/", $dir );
		}

		/** Funcao para registro do autoload */
		public  static function registerLoad( $class ) {

			$class = strtolower(preg_replace('/(?|([a-z\d])([A-Z]))/', '$1_$2', str_replace( "\\", "/", $class )));
			$file = self::$app_root."/".$class. '.class.php';
			$file = self::normalizeDir( $file );

			if (file_exists($file)) {
				require $file;
			}
			
		}
	}