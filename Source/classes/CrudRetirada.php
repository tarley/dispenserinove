<?php
require_once 'BDConnection.php';

class CrudRetirada {
	
	private $db;
	
	function __construct()
	{
		$conn = new BDConnection();
		$this->db = $conn->getConnection();
	}
	
	public function getByFilter($codPaciente, $codProduto){
		
		$sql .= "select pr.cod_retirada, pr.cod_atendimento, pr.cod_produto, pr.num_quant_saida, dta_saida, sp.des_status ";
		$sql .= "from produtos_retirados pr ";
		$sql .= "join situacao_produto sp on sp.cod_status=pr.cod_status ";
		$sql .= "where cod_atendimento = :codAtendimento and cod_produto= :codProduto" ;
		$sth = $this->db->prepare($sql);
		$sth->bindValue(':codAtendimento', $codPaciente);
		$sth->bindValue(':codProduto', $codProduto);
		$sth->execute();
		
		return $sth->fetchAll(PDO::FETCH_ASSOC);
	}
	
	
}