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
		try{
			$sql = "select pr.cod_retirada, pr.cod_atendimento, pr.cod_produto, pr.num_quant_saida, dta_saida, sp.des_status ";
			$sql .= "from produto_retirado pr ";
			$sql .= "join situacao_produto sp on sp.cod_status=pr.cod_status ";
			$sql .= "where cod_atendimento = :codAtendimento and cod_produto= :codProduto";
			$sth = $this->db->prepare($sql);
			$sth->bindValue(':codAtendimento', $codPaciente);
			$sth->bindValue(':codProduto', $codProduto);
			$sth->execute();
			
			return $sth->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e)
		{
			return null;
		}
	}
	
	public function insert($cod_atendimento, $cod_produto, $cod_status, $cod_func, $num_qtd_saida, $data_saida){
		try {
			$sql .= "INSERT INTO produto_retirado ";
			$sql .= "(cod_atendimento, cod_produto, cod_status, cod_func, num_quant_saida, dta_saida) ";
			$sql .= "VALUES ";
     		$sql .= "(:cod_atendimento, :cod_produto, :cod_status, :cod_func, :num_qtd_saida, :data_saida)";
				
			$stmt = $this->db->prepare($sql);
		
			$stmt->bindparam(":cod_atendimento", $cod_atendimento, PDO::PARAM_INT);
			$stmt->bindparam(":cod_produto", $cod_produto, PDO::PARAM_INT);
			$stmt->bindparam(":cod_status", $cod_status, PDO::PARAM_INT);
			$stmt->bindparam(":cod_func", $cod_func, PDO::PARAM_INT);
			$stmt->bindparam(":num_qtd_saida", $num_qtd_saida, PDO::PARAM_INT);
			$stmt->bindparam(":data_saida", $data_saida, PDO::PARAM_STR);
			
			return $stmt->execute () ? true : false;
		} catch ( PDOException $e ) {
			return false;
		}
	}
	
	public function getByPaciente($cod){
		try{
			$sql = "select pr.cod_retirada, pr.cod_produto, p.des_produto, pr.num_quant_saida, dta_saida, sp.des_status"; 
			$sql .= "from produto_retirado pr ";  
			$sql .= "join situacao_produto sp on sp.cod_status=pr.cod_status "; 
		    $sql .= "join produto p on p.cod_produto=pr.cod_produto ";
			$sql .= "where cod_atendimento = :codAtendimento";
			$sth = $this->db->prepare($sql);
			$sth->bindValue(':codAtendimento', $cod, PDO::PARAM_INT);
			$sth->execute();
				
			return $sth->fetchAll(PDO::FETCH_ASSOC);
		}
		catch(PDOException $e)
		{
			return null;
		}
	}
}