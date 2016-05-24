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
		
		$sql .= "select p.cod_produto, p.des_produto";
		$sql .= "  from produto p ";
		$sql .= "where p.cod_produto= :codProduto" ;
		$sth = $this->db->prepare($sql);
		$sth->bindValue(':codProduto', $codProduto);
		$sth->execute();
		
		return $sth->fetchAll(PDO::FETCH_ASSOC);
	}
	
	
}