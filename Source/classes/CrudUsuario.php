<?php
require_once 'BDConnection.php';
require_once 'Logger.php';
require_once 'Util.php';
class Usuario {
	
	private $db;
	
	function __construct()
	{
		$conn = new BDConnection();
		$this->db = $conn->getConnection();
	}
	
	public function register($nom_func, $des_turno, $cod_senha, $nom_usuario, $admin) {
		try {
			
			$admin = $admin == 1 ? 1 : 0;
			
			$senha = md5($cod_senha+CHAVE);
			
			$sql = "INSERT INTO funcionario_farmacia ";
			$sql .= "(nom_func,des_turno,cod_senha,nom_usuario,dta_cadastro,admin) ";
			$sql .= "VALUES (:nom_func,:des_turno,:cod_senha,:nom_usuario,current_date(),:admin)";
			
			$stmt = $this->db->prepare($sql);
			$data = date("Y-m-d");
			$stmt->bindparam(":nom_func", $nom_func);
			$stmt->bindparam(":des_turno", $des_turno);
			$stmt->bindparam(":cod_senha", $senha);
			$stmt->bindparam(":nom_usuario", $nom_usuario);
			$stmt->bindparam(":admin", $admin);
			
			
			return $stmt->execute () ? true : false;
		} catch ( PDOException $e ) {
			return false;
		}
	}
	
	public function verificar_nome_usuario($nom_usuario){
		try
		{
			$stmt = $this->db->prepare("SELECT cod_func FROM funcionario_farmacia WHERE NOM_USUARIO=:usuario LIMIT 1");
			$stmt->execute(array(':usuario'=>$nom_usuario));
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
	
	public function login($usuario, $senha)
	{
		try
		{
			$senha = md5($senha+CHAVE);
			Logger("Usuario: " . $usuario . " Senha: " . $senha . " DB" . isset($this->db));
			$stmt = $this->db->prepare("SELECT cod_func,nom_func,des_turno,cod_senha,nom_usuario,dta_cadastro,admin FROM funcionario_farmacia WHERE nom_usuario=:usuario AND cod_senha=:senha and ativo=1 LIMIT 1");
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
			Logger($e);
			echo false;
		}
	}
	
	public function getAll(){
		try {
		$sql = "select cod_func, nom_func, des_turno, nom_usuario, dta_cadastro, admin, ativo ";
		$sql .= "from funcionario_farmacia ";
		$sth = $this->db->prepare($sql);
		$sth->execute();
		return $sth->fetchAll(PDO::FETCH_ASSOC);
		}
		catch ( PDOException $e ) {
			return null;
		}
		
	}
	
	public function getByFilter($nome, $ativo){
		try {
			$sql = "select cod_func, nom_func, des_turno, nom_usuario, dta_cadastro, admin, ativo ";
			$sql .= "from funcionario_farmacia ";
			$sql .= "where nom_func like :nome and ativo=:ativo" ;
			$sth = $this->db->prepare($sql);
			$sth->bindValue(':nome', '%'.$nome.'%');
			$sth->bindValue(':ativo', $ativo);
			$sth->execute();
	
			return $sth->fetchAll(PDO::FETCH_ASSOC);
		}
		catch ( PDOException $e ) {
			return null;
		}
	}
	
	public function desativarByID($cod){
		try {
			$sql = "UPDATE funcionario_farmacia ";
			$sql .= "SET ativo = 0 ";
			$sql .= "WHERE COD_FUNC = :cod";
			$stmt = $this->db->prepare($sql);
				
			$stmt->bindparam(":cod", $cod);				
				
			return $stmt->execute () ? true : false;
		} catch ( PDOException $e ) {
			return false;
		}
	}
	public function ativarByID($cod){
		try {
			$sql = "UPDATE funcionario_farmacia ";
			$sql .= "SET ativo = 1 ";
			$sql .= "WHERE COD_FUNC = :cod";
			$stmt = $this->db->prepare($sql);
	
			$stmt->bindparam(":cod", $cod);
	
			return $stmt->execute () ? true : false;
		} catch ( PDOException $e ) {
			return false;
		}
	}
	public function is_admin()
	{		
		return $_SESSION[user_session][admin] == 1 ? true : false;
	}
	
	public function is_loggedin()
	{
		return isset($_SESSION['user_session']) ? true : false;
	}
	
	public function redirect($url)
	{
		$u = new Util();
		$u->Redirect($url, false);
		//echo "<meta http-equiv=\"Location\" content=\"$url\">";
		//header("Location: $url");
	}
	
	public function logout()
	{
		unset($_SESSION['user_session']);
		session_destroy();
		return true;
	}
}