<?php
require_once 'BDConnection.php';

class CrudProduto {
	
	private $db;
	
	function __construct()
	{
		$conn = new BDConnection();
		$this->db = $conn->getConnection();
	}
	
	public function getByFilter($codProduto){
		try {
		$sql = "select p.cod_produto, p.des_produto ";
		$sql .= "from produto p ";
		$sql .= "where p.cod_produto= :codProduto" ;
		$sth = $this->db->prepare($sql);
		$sth->bindValue(':codProduto', $codProduto);
		$sth->execute();
		
		return $sth->fetchAll(PDO::FETCH_ASSOC);
		}
		catch ( PDOException $e ) {
			return null;
		}
	}
	
	public function getAll(){
		try {
			$sql = "select p.cod_produto, p.des_produto ";
			$sql .= "from produto p ";
			$sth = $this->db->prepare($sql);
			$sth->execute();
		
			return $sth->fetchAll(PDO::FETCH_ASSOC);
		}
		catch ( PDOException $e ) {
			return null;
		}
	}
	
	public function produtoExiste($cod){
		try
		{
			$stmt = $this->db->prepare("select cod_produto from produto where cod_produto=:cod LIMIT 1");
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
			return  false;
		}
	}
	
	public function insert($cod, $desc) {
		try {
			$sql .= "INSERT INTO produto ";
			$sql .= "(cod_produto,des_produto) ";
			$sql .= "VALUES(:cod,:desc) ";
							
			$stmt = $this->db->prepare($sql);
				
			$stmt->bindparam(":cod", $cod);
			$stmt->bindparam(":desc", $desc);
				
				
			return $stmt->execute () ? true : false;
		} catch ( PDOException $e ) {
			return false;
		}
	}
		
}