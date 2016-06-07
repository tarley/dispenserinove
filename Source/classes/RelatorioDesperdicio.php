<?php
require_once 'BDConnection.php';
class RelatorioDesperdicio {
	
	private $db;
	
	function __construct()
	{
		$conn = new BDConnection();
		$this->db = $conn->getConnection();
	}
	
	public function getByFilter(){
		try {
			$sql = "select ra.nom_paciente, p.des_produto, hr.num_quant_retorno, pr.dta_saida, hr.dta_retorno, hr.des_motivo from produto_retirado pr ";
			$sql .= "join produto p on p.cod_produto=pr.cod_produto ";
			$sql .= "join historico_retorno hr on hr.cod_retirada=pr.cod_retirada ";
			$sql .= "join registro_atendimento ra on ra.cod_atendimento=pr.cod_atendimento ";
			$sql .= "where  pr.cod_status=(select cod_status from situacao_produto where des_status='desperdício' limit 1)" ;
			$sth = $this->db->prepare($sql);
			$sth->execute();
	
			return $sth->fetchAll(PDO::FETCH_ASSOC);
		}
		catch ( PDOException $e ) {
			return null;
		}
	}
}