<?php
require_once 'BDConnection.php';

class CrudDesperdicio {
	
	private $db;
	
	function __construct()
	{
		$conn = new BDConnection();
		$this->db = $conn->getConnection();
	}
	
	
	public function insertDesp($codretirada, $data, $quantidade, $motivo) {
		try {
			
			$sql .= "INSERT INTO historico_retorno ";
			$sql .= "(cod_retirada,dta_retorno,num_quant_retorno,des_motivo) ";
			$sql .= "VALUES (:codretirada,:data,:quantidade,:motivo) ";
							
			$stmt = $this->db->prepare($sql);
				
			$stmt->bindparam(":codretirada", $codretirada);
			$stmt->bindparam(":data", $data);
			$stmt->bindparam(":quantidade", $quantidade);
			$stmt->bindparam(":motivo", $motivo);
				
				
			return $stmt->execute () ? true : false;
		} catch ( PDOException $e ) {
			return false;
		}
	}
	
	
	
	
}	
