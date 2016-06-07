<?php
session_start ();
require_once 'classes/CrudUsuario.php';
require_once 'classes/Util.php';
$u = new Util ();
$usuario = new Usuario ();

if (! $usuario->is_loggedin ()) {
	$usuario->logout ();
	$usuario->redirect ( "index.php" );
} else if (! isset ( $_GET ['tipo'] ) and ! isset ( $_GET ['codigo'] )) {
	$u->alerta ( "variavel nao setada!" );
	$usuario->redirect ( "ConsultarUsuario.php" );
} else {
	
	switch ($_GET ['tipo']) {
		case "usuario" :
			if ($usuario->is_admin ()) {
				if ($usuario->ativarByID ( $_GET ['codigo'] )) {
					$u->alerta ( "Usuário ativado com sucesso!" );
					echo "<script>window.location='ConsultarUsuario.php'</script>";
				} else {
					$u->alerta ( "Erro ao tentar ativar usuário!" );
					echo "<script>window.location='ConsultarUsuario.php'</script>";
				}
			} else {
				$u->alerta ( "Sem acesso!" );
				echo "<script>window.location='ConsultarRetirada.php'</script>";
			}
			break;
		case "x" :
			echo "afd";
			break;
		default :
			echo "<script>window.location='ConsultarRetirada.php'</script>";
			break;
	}
}

