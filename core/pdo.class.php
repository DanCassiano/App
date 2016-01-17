<?php 
	
	namespace Core;
	/**
	* MyPDO
	*/
	class Pdo
	{
		private $conn;

		private $query;

		function __construct( ) {

			$dsn = 'mysql:host=' . HOST . ';dbname=' . BANCO;
			$opcoes = array(\PDO::MYSQL_ATTR_INIT_COMMAND => "SET NAMES utf8");
			if (empty($this->conn)) {
				
				try {
				
					$this->conn = new \PDO($dsn, USUARIO, SENHA, $opcoes);
					$this->conn->setAttribute(\PDO::ATTR_ERRMODE, \PDO::ERRMODE_EXCEPTION);
				
				} catch (\PDOException $e) {
					
					var_dump( $e );
				}
			}
		}

		/**
		 * @param  String
		 * @param  array
		 * @return [type]
		 */
		public function read( $sql, $parametros = null ) {

			if( $this->query( $sql, $parametros ) )
				return $this->getResult();

			return false;
		}

		public function getResult( $mode = \PDO::FETCH_ASSOC ) {
			return $this->query->fetchAll( $mode );
		}

		private function query($sql, $parametros) {
			try{
				$db = $this->conn->prepare($sql);

				if( !empty( $parametros ) ) {

					parse_str( $parametros,  $parametros );

					if( is_array( $parametros )) {

						$chaves = array_keys( $parametros );
						foreach ($chaves as $chave) {
							$bind = ":".$chave;
							$db->bindValue( $bind, $parametros[ $chave ] );
						}
					}
				}

				$db->execute();

			}
			catch(\PDOException $e){
				return false;
			}
			$this->query = $db;
			return true;
		}

		public function insert( $tabela,  $dados ) {

			$this->conn->beginTransaction();
			$id = 0;

			try {
					$chaves = array_keys( $dados );
					foreach ($chaves as $chave) {
						$binds .= ":".$chave.", ";
					}
					$binds 	= substr($binds, 0 , -2);
					$chaves = implode(", ", $chaves );
					$pdo 	= $this->conn->prepare("INSERT INTO ".$tabela." ( ".$chaves." ) VALUES ( ".$binds." )");
					$pdo->execute( $dados );
					$id 	= $this->conn->lastInsertId();
					$this->conn->commit();
				}
				catch(\PDOException $e) {
					$this->conn->rollback();
					// var_dump($e->getMessage());
				}
			return $id;
		}


		public function getRowCount(){
			return $this->query->rowCount();
		}

		public function setLog($msg, $sql, $tabela, $idUser) {
		
	 			$dados = array(	"hora"	=>date('Y-m-d H:i:s'),
								"ip" 				=> $_SERVER['REMOTE_ADDR'],
								"relacionamento"	=> $idUser,
								"query"				=> addslashes($sql),
								"tabela"			=> $tabela,
								"mensagem"			=> mysql_escape_string($msg));

	 		 	$t = $this->insert('logs', $dados );
		}

		 // Fechando a Connexao
		function __destruct() {
			try {
				$this->conn = null;
			} catch (\PDOException $e) {
				die($e->getMessage());
			}
		}
	}