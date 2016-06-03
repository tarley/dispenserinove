<?php
require_once 'BDConnection.php';

class CrudDesperdicio {
	
	private $db;
	
	function __construct()
	{
		$conn = new BDConnection();
		$this->db = $conn->getConnection();
	}
	
	public function desperdicio($cod_retirada, $dta_retorno, $num_quant_retorno, $des_motivo) {
		
		$sql = "INSERT INTO historico_retorno (cod_retirada,dta_retorno,num_quant_retorno,des_motivo) VALUES (:codretirada,:data,:quantidade,:motivo);";
			
	}
}	
