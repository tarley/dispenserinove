<?php
define ( 'HOST', 'localhost' );
define ( 'DBNAME', 'dispenserinove' );
define ( 'CHARSET', 'utf8' );
define ( 'USER', 'root' );
define ( 'PASSWORD', '' );

class BDConnection {
	protected $db;
	public function BDConnection() {
		$conn = NULL;
		try {
			$opcoes = array (
					PDO::MYSQL_ATTR_INIT_COMMAND => 'SET NAMES UTF8',
					PDO::ATTR_PERSISTENT => TRUE 
			);
			
			$conn = new PDO ( "mysql:host=" . HOST . "; dbname=" . DBNAME . "; charset=" . CHARSET . ";", USER, PASSWORD, $opcoes );
			$conn->setAttribute ( PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION );
		} catch ( PDOException $e ) {
			$conn = NULL;
		}
		$this->db = $conn;
	}
	public function getConnection() {
		return $this->db;
	}
}

?>