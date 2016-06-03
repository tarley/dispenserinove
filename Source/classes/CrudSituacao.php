<?php
require_once 'BDConnection.php';
class CrudSituacao {
	private $db;
	function __construct() {
		$conn = new BDConnection ();
		$this->db = $conn->getConnection ();
	}
	public function comboSituacao() {
		try {
			$sql = "select cod_status, des_status from situacao_produto order by des_status";
			$sth = $this->db->prepare ( $sql );
			$sth->execute ();
			
			$lista =  $sth->fetchAll ( PDO::FETCH_ASSOC );
			
			foreach($lista as $key => $value) {
				echo '<option value="'.$value[cod_status].'">'.$value[des_status].'</option>';
			}
		} catch ( PDOException $e ) {
			echo null;
		}
	}
}