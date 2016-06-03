<?php
require_once 'BDConnection.php';

class CrudAtentimento {
	
	private $db;
	
	function __construct()
	{
		$conn = new BDConnection();
		$this->db = $conn->getConnection();
	}
	
	public function insert($cod, $nome) {
		try {
			$sql .= "INSERT INTO registro_atendimento ";
			$sql .= "(cod_atendimento,nom_paciente) ";
			$sql .= "VALUES (:cod, :nome)";
			
			$stmt = $this->db->prepare($sql);
			$stmt->bindparam(":cod", $cod);
			$stmt->bindparam(":nome", $nome);
			
			return $stmt->execute () ? true : false;
		} catch ( PDOException $e ) {
			return false;
		}
	}
	
	public function pacienteExiste($cod){
		try
		{
			$stmt = $this->db->prepare("select cod_atendimento from registro_atendimento where cod_atendimento=:cod LIMIT 1");
			$stmt->execute(array(':cod'=>$cod));
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
			echo false;
		}
	}
}