<?php
require_once 'BDConnection.php';
class CrudProduto {
	private $db;
	function __construct() {
		$conn = new BDConnection ();
		$this->db = $conn->getConnection ();
	}
	private function valida_duplicidade($codigo) {
		$sql = "select cod_produto from produto where cod_produto = :codigo";
		$sth = $this->db->prepare ( $sql );
		$sth->bindValue ( ':codigo', $codigo );
		
		$sth->execute ();
		
		return $sth->rowCount();
	}
	
	public function insert($codigo, $descricao) {
		try {
			if ($this->valida_duplicidade ( $codigo ) == 0) {
				$stmt = $this->db->prepare ( "insert into produto (cod_produto, des_produto) VALUES (:codigo, :des)" );
				$stmt->bindParam ( ':codigo', $codigo );
				$stmt->bindParam ( ':des', $descricao );
				
				return $stmt->execute () ? true : false;
			} else {
				return false;
			}
		} catch ( PDOException $ex ) {
			return false;
		}
	}
}