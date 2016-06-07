<?php
require_once 'BDConnection.php';
class CrudRetirada {
	private $db;
	function __construct() {
		$conn = new BDConnection ();
		$this->db = $conn->getConnection ();
	}
	public function getByFilter($codPaciente, $codProduto) {
		try {
			$sql = "select pr.cod_retirada, pr.cod_atendimento, pr.cod_produto, pr.num_quant_saida, dta_saida, sp.des_status ";
			$sql .= "from produto_retirado pr ";
			$sql .= "join situacao_produto sp on sp.cod_status=pr.cod_status ";
			$sql .= "where cod_atendimento = :codAtendimento and cod_produto= :codProduto";
			$sth = $this->db->prepare ( $sql );
			$sth->bindValue ( ':codAtendimento', $codPaciente );
			$sth->bindValue ( ':codProduto', $codProduto );
			$sth->execute ();
			
			return $sth->fetchAll ( PDO::FETCH_ASSOC );
		} catch ( PDOException $e ) {
			return null;
		}
	}
	public function insert($cod_atendimento, $cod_produto, $cod_status, $cod_func, $num_qtd_saida) {
		try {
			$sql .= "INSERT INTO produto_retirado ";
			$sql .= "(cod_atendimento, cod_produto, cod_status, cod_func, num_quant_saida, dta_saida) ";
			$sql .= "VALUES ";
			$sql .= "(:cod_atendimento, :cod_produto, (select cod_status from situacao_produto where DES_STATUS ='Em uso' limit 1), :cod_func, :num_qtd_saida, current_date())";
			
			$stmt = $this->db->prepare ( $sql );
			
			$stmt->bindparam ( ":cod_atendimento", $cod_atendimento, PDO::PARAM_INT );
			$stmt->bindparam ( ":cod_produto", $cod_produto, PDO::PARAM_INT );
			$stmt->bindparam ( ":cod_func", $cod_func, PDO::PARAM_INT );
			$stmt->bindparam ( ":num_qtd_saida", $num_qtd_saida, PDO::PARAM_INT );
			
			return $stmt->execute () ? true : false;
		} catch ( PDOException $e ) {
			return false;
		}
	}
	public function validaRetirada($cod_paciente, $cod_produto) {
		try {
			$sql = "select cod_retirada from produto_retirado ";
			$sql .= "where cod_atendimento=:cod_paciente and cod_produto=:cod_produto ";
			$sql .= "and cod_status<>(select cod_status from situacao_produto where des_status='Desperdício' limit 1) ";
			$sql .= "and cod_status<>(select cod_status from situacao_produto where des_status='Vencido' limit 1)";
			$sql .= "and cod_status<>(select cod_status from situacao_produto where des_status='Baixado' limit 1)";
			
			$stmt = $this->db->prepare ( $sql );
			$stmt->execute ( array (
					':cod_paciente' => $cod_paciente,
					':cod_produto' => $cod_produto 
			) );
			$userRow = $stmt->fetch ( PDO::FETCH_ASSOC );
			if ($stmt->rowCount () > 0) {
				return false;
			} else {
				return true;
			}
		} catch ( PDOException $e ) {
			echo true;
		}
	}
	public function getFromStatus($cod) {
		try {
			$sql = "select pr.cod_retirada, pr.cod_produto, p.des_produto, ra.cod_atendimento, ra.nom_paciente, sp.des_status from produto_retirado pr ";
			$sql .= "join registro_atendimento ra on ra.cod_atendimento=pr.cod_atendimento ";
			$sql .= "join produto p on pr.cod_produto=p.cod_produto ";
			$sql .= "join situacao_produto sp on sp.cod_status=pr.cod_status ";
			$sql .= "where cod_retirada=:cod";
			
			$sth = $this->db->prepare ( $sql );
			$sth->bindValue ( ':cod', $cod );
			$sth->execute ();
			return $sth->fetchAll ( PDO::FETCH_ASSOC );
		} catch ( PDOException $e ) {
			return null;
		}
	}
	public function getByPaciente($cod) {
		try {
			$sql = "select pr.cod_retirada, pr.cod_produto, p.des_produto, pr.num_quant_saida, dta_saida, sp.des_status ";
			$sql .= "from produto_retirado pr ";
			$sql .= "join situacao_produto sp on sp.cod_status=pr.cod_status ";
			$sql .= "join produto p on p.cod_produto=pr.cod_produto ";
			$sql .= "where cod_atendimento = :codAtendimento";
			$sth = $this->db->prepare ( $sql );
			$sth->bindValue ( ':codAtendimento', $cod, PDO::PARAM_INT );
			$sth->execute ();
			
			return $sth->fetchAll ( PDO::FETCH_ASSOC );
		} catch ( PDOException $e ) {
			return null;
		}
	}
	
	public function alterarStatus($cod_status, $cod_retirada){
		try {
			$sql .= "update produto_retirado ";
			$sql .= "set cod_status=:cod_status where cod_retirada=:cod_retirada";
				
			$stmt = $this->db->prepare ( $sql );
				
			$stmt->bindparam ( ":cod_status", $cod_status, PDO::PARAM_INT );
			$stmt->bindparam ( ":cod_retirada", $cod_retirada, PDO::PARAM_INT );
				
			return $stmt->execute () ? true : false;
		} catch ( PDOException $e ) {
			return false;
		}		
	}
}