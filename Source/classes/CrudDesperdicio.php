<?php
require_once 'BDConnection.php';

class CrudDesperdicio {
	
	private $db;
	
	function __construct()
	{
		$conn = new BDConnection();
		$this->db = $conn->getConnection();
	}
	
	
	public function insertDesp($codretirada, $quantidade, $motivo) {
		try {
                        

			$sql = "INSERT INTO historico_retorno ";
			$sql .= "(cod_retirada, dta_retorno, num_quant_retorno, des_motivo) ";
			$sql .= "VALUES (:codretirada,current_date(), :quantidade,:motivo) ";
							
			$stmt = $this->db->prepare($sql);
				
			$stmt->bindparam(":codretirada", $codretirada);
			$stmt->bindparam(":quantidade", $quantidade);
			$stmt->bindparam(":motivo", $motivo);
				
				
			return $stmt->execute () ? true : false;
		} catch ( PDOException $e ) {
			return false;
		}
	}
	

	public function retornoExiste($codretirada){
		try
		{
			$stmt = $this->db->prepare("select cod_retirada from historico_retorno where cod_retirada= :codretirada LIMIT 1");
			$stmt->execute(array(":codretirada"=>$codretirada));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() > 0)
			{
				return false;
			}
			else
			{
				return true;
			}
		}
		catch(PDOException $e)
		{
			return  false;
		}
	}
	
        public function alteraStatus($codretirada){
            try
            {
                
                    $sql = "UPDATE  produto_retirado";
                    $sql .= "SET cod_status = '3'";
                    $sql .= "WHERE cod_retirada = :codretirada" ;
					
					$stmt = $this->db->prepare($sql);
					$stmt->bindparam(":codretirada", $codretirada);				
				
					return $stmt->execute () ? true : false;

                }
                catch(PDOException $e)
		{
			return  false;
		}
        }
        

}	
