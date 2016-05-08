<?php

class BDConnection{

	protected $db;

	public function BDConnection(){

		$conn = NULL;

		try{
			$conn = new PDO("mysql:host=localhost;dbname=test", "root", "");
			$conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
		} catch(PDOException $e){
			echo 'ERROR: ' . $e->getMessage();
		}
		$this->db = $conn;
	}

	public function getConnection(){
		return $this->db;
	}
}

?>