<?php 
	namespace Core\Controller;
	/**
	* AppAdminController
	*/
	class AppAdminController
	{
		
		/** @var string idioma */
		private $lang = "pt-BR";

		/** @var string titulo do app */
		private $titulo = "";

		/** @var array configuracoes do modulo */
		private $moduloConfig;

		/** @var Acao acao da pagina */
		private $action;

		/** @var array array com os demais dados */
		private $parametros;

		/** @var array dados vindos de variaveis passadas por get */
		private $query;

		/** @var string diretorio dos modulos */
		private $dirModulos = "/app-admin/modulos/";

		/**
		 * Busca a interface
		 * @param  string $action     modulo ou acao do sistema
		 * @param  string $parametros parametros secundarios do modulo
		 * @param  array $query      parametros vindos por get ou post 
		 */
		public function render( $action, $parametros, $query){
			
			$s = new \Core\Session();
			$s->start();
			$this->titulo 		= "App-Admin";
			$this->action 		= $action;
			$this->parametros 	= $parametros;
			$this->query 		= $query;
			$this->getDashBoard();
		}

		/**
		 * Busca e carrega as configuracoes e o Dashboard 
		 */
		private function getDashBoard(){
			$app = $this;

			if( !empty( $this->action ) && $this->existe( $this->action ) ) {

				$this->moduloConfig = $this->parseIniFileExtended(
									DIR_BASE . $this->dirModulos . $this->action."/init.php"
								);

			}
			require DIR_BASE."/app-admin/view/index.php";
		}

		/**
		 * Busca o modulo
		 * @return this
		 */
		private function getModulo() {
			
			if( !empty( $this->action ) && $this->existe( $this->action ) ) {
				
				$app = $this;
				require DIR_BASE . $this->dirModulos . $this->action."/{$this->action}.modulo.php";
			}
			return $this;
		}

		/**
		 * interpreta o arquivo de configuracao
		 * @param  string $filename arquivo de configuracao
		 * @return array           
		 */
		private function parseIniFileExtended($filename) {

			$p_ini = parse_ini_file($filename, true);
			$config = array();
			foreach($p_ini as $namespace => $properties) {

				@list($name, $extends) = explode(':', $namespace);
				$name 		= trim($name);
				$extends 	= trim($extends);

				// create namespace if necessary
				if(!isset($config[$name]))
					$config[$name] = array();

					// inherit base namespace
				if(isset($p_ini[$extends])) {
				
					foreach($p_ini[$extends] as $prop => $val)
						$config[$name][$prop] = $val;
				}
				
				// overwrite / set current namespace values
				foreach($properties as $prop => $val)
					$config[$name][$prop] = $val;
			}
			return $config;
		}

		private function existe( $modulo ) {
			return file_exists( DIR_BASE . $this->dirModulos . $modulo."/init.php" );
		}

		/** monta o css */
		private function getCSS( ) {

			$css = "";
			if( !empty( $this->moduloConfig['css'] ) ) {

				foreach ( $this->moduloConfig['css'] as $c => $ss ) {

					$css .= "<link rel=\"stylesheet\" href=\"".URL_BASE."{$this->dirModulos}{$ss}\">";
				}
			}

			echo $css;
		}

		/**
		 * monta os scripts do modulo
		 * 
		 */
		private function getScripts() {
			$script = "";
			if( !empty( $this->moduloConfig['script'] ) ) {

				foreach ( $this->moduloConfig['script'] as $s => $cript ) {

					$script .= "<script src=\"".URL_BASE."{$this->dirModulos}{$cript}\"\"></script>";
				}
			}

			echo $script;
		}

		private function getHeader() {
			require DIR_BASE."/app-admin/view/header.php";
			return $this;
		}

		private function getFooter() {
			require DIR_BASE."/app-admin/view/footer.php";
			return $this;
		}

		private function isLogin() {
			return $this;
		}

	}