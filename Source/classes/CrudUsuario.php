<?php
require_once 'BDConnection.php';

class Usuario {
	
	private $db;
	
	function __construct()
	{
		$conn = new BDConnection();
		$this->db = $conn->getConnection();
	}
	
	public function register($nom_func, $des_turno, $cod_senha, $nom_usuario, $admin) {
		try {
			
			$senha = md5($cod_senha+CHAVE);
			
			$sql = "INSERT INTO funcionario_farmacia ";
			$sql .= "(NOM_FUNC,DES_TURNO,COD_SENHA,NOM_USUARIO,DTA_CADASTRO,ADMIN) ";
			$sql .= "VALUES (:NOM_FUNC,:DES_TURNO,:COD_SENHA,:NOM_USUARIO,:DTA_CADASTRO,:ADMIN);";
			
			$stmt = $this->db->prepare("INSERT INTO users(user_name,user_email,user_pass) 
                                                       VALUES(:uname, :umail, :upass)" );
			
			$stmt->bindparam(":NOM_FUNC", $nom_func);
			$stmt->bindparam(":DES_TURNO", $des_turno);
			$stmt->bindparam(":COD_SENHA", $cod_senha);
			$stmt->bindparam(":NOM_USUARIO", $nom_usuario);
			$stmt->bindparam(":DTA_CADASTRO", date("Y-m-d H:i:s"));
			$stmt->bindparam(":ADMIN", $admin);
			$stmt->execute ();
			
			return $stmt;
		} catch ( PDOException $e ) {
			echo $e->getMessage ();
		}
	}
	
	public function login($usuario, $senha)
	{
		try
		{
			$senha = md5($senha+CHAVE);
			$stmt = $this->db->prepare("SELECT * FROM funcionario_farmacia WHERE NOM_USUARIO=:usuario AND COD_SENHA=:senha LIMIT 1");
			$stmt->execute(array(':usuario'=>$usuario, ':senha'=>$senha));
			$userRow=$stmt->fetch(PDO::FETCH_ASSOC);
			if($stmt->rowCount() > 0)
			{
				$_SESSION['user_session'] = $userRow;
				return true;
			}
			else
			{
				return false;
			}
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();
		}
	}
}